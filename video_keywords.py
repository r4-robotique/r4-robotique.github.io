#!/usr/bin/env python3
"""
Retrieves the transcript of YouTube videos (using yt-dlp) and builds their keywords.

For each video, this writes:
  transcripts/<id>.<lang>.txt   the transcript (kept, so that it is only downloaded once)
  keywords/<id>.json            the keywords, with their number of occurrences

Usage: ./video_keywords.py [--refresh] [--top N] [--min-count N] -- <video-id>...
"""

import argparse
import collections
import glob
import json
import os
import re
import subprocess
import sys
import textwrap
import time
import urllib.error
import urllib.request

ROOT = os.path.dirname(os.path.abspath(__file__))
TRANSCRIPTS = os.path.join(ROOT, "transcripts")
KEYWORDS = os.path.join(ROOT, "keywords")

# The default client of yt-dlp needs a JS runtime and a PO token to get the captions
YT_DLP = ["yt-dlp", "--extractor-args", "youtube:player_client=android"]

# Pause between two downloads, to avoid being rate limited by YouTube
PAUSE = 5

STOPWORDS = set(
    """
    a about above after again against all also am an and any are aren as at be because been before
    being below between both but by can cannot could couldn did didn do does doesn doing don down
    during each few for from further had hadn has hasn have haven having he her here hers herself
    him himself his how i if in into is isn it its itself just ll me more most mustn my myself no
    nor not now of off on once only or other our ours ourselves out over own re same shan she
    should shouldn so some such than that the their theirs them themselves then there these they
    this those through to too under until up ve very was wasn we were weren what when where which
    while who whom why will with won would wouldn you your yours yourself yourselves

    actually already always another around back basically bit can come comes course different
    done even every example first get gets give given going gonna good got here kind know let
    like little look lot make makes many may maybe mean means much need next nice one two three
    part point put quite really right say second see something sort still sure take thank thanks
    thing things think time today try use used using want way well yes

    ah eh euh hein hm hmm huh mhm oh ok okay uh um yeah

    ai aie ait alors au aucun aussi autre autres aux avais avait avant avec avez avoir avons bon
    car ce cela ces cet cette ceux chaque ci comme comment dans de des deux donc dont du elle
    elles en encore entre es est et etc eu eux fait faire fois font hors ici il ils je la le les
    leur leurs lui là ma mais me mes moi moins mon même ne ni non nos notre nous on ont ou où par
    parce pas peu peut peuvent plus pour pourquoi quand que quel quelle quelles quels qui quoi sa
    sans se sera ses si soit sommes son sont sous suis sur ta tandis te tes toi ton tous tout
    toute toutes trois très tu un une va vais vas vers voici voilà vont vos votre vous vu ça
    étaient étais était étant été être

    ainsi après assez avoir beaucoup bien cas chose choses coup côté dire dit dois doit effet
    exemple façon faut merci oui petit peux point puis quelque quelques truc trucs vraiment
    """.split()
)

WORD = re.compile(r"[^\W\d_]+(?:-[^\W\d_]+)*")


def find_transcript(video):
    """Returns (path, language) of the stored transcript of a video, or None"""
    files = glob.glob(os.path.join(glob.escape(TRANSCRIPTS), glob.escape(video) + ".*.txt"))
    if not files:
        return None
    return files[0], os.path.basename(files[0])[len(video) + 1 : -len(".txt")]


def pick_track(info):
    """Chooses the captions to use: (language, tracks), preferring the ones that were written by a human"""
    subtitles = {lang: tracks for lang, tracks in (info.get("subtitles") or {}).items() if lang != "live_chat"}
    if subtitles:
        for lang in [info.get("language"), "fr", "en"] + list(subtitles):
            if lang in subtitles:
                return lang, subtitles[lang]

    # Automatic captions are listed in all the languages they can be translated to, the spoken one is "-orig"
    automatic = info.get("automatic_captions") or {}
    for lang, tracks in automatic.items():
        if lang.endswith("-orig"):
            return lang[: -len("-orig")], tracks
    if info.get("language") in automatic:
        return info["language"], automatic[info["language"]]

    return None


def fetch(url):
    for delay in [10, 30, 60, None]:
        try:
            request = urllib.request.Request(url, headers={"User-Agent": "Mozilla/5.0"})
            with urllib.request.urlopen(request, timeout=30) as response:
                return response.read()
        except urllib.error.HTTPError as e:
            if e.code != 429 or delay is None:
                raise
            print(f"  rate limited, retrying in {delay}s", file=sys.stderr)
            time.sleep(delay)


def download_transcript(video):
    """Downloads the transcript of a video, returns (text, language)"""
    result = subprocess.run(
        YT_DLP + ["--skip-download", "-J", "https://www.youtube.com/watch?v=" + video],
        capture_output=True,
        text=True,
    )
    if result.returncode != 0:
        errors = [line for line in result.stderr.splitlines() if line.startswith("ERROR")]
        raise RuntimeError("\n".join(errors) or result.stderr.strip())

    track = pick_track(json.loads(result.stdout))
    if track is None:
        raise RuntimeError("no captions available")
    lang, tracks = track

    urls = [t["url"] for t in tracks if t.get("ext") == "json3" and "url" in t]
    if not urls:
        raise RuntimeError("captions are not available as json3")

    parts = []
    for event in json.loads(fetch(urls[0])).get("events", []):
        parts.append("".join(seg.get("utf8", "") for seg in event.get("segs", [])))
    text = " ".join(parts)

    # Removing sound annotations ([Music], [laughter]...) and speaker change markers
    text = re.sub(r"\[[^\]]*\]|>>", " ", text)
    text = re.sub(r"\s+", " ", text).strip()
    if not text:
        raise RuntimeError("captions are empty")

    return text, lang


def build_keywords(text, top, min_count):
    """Returns the number of words of a text, and its keywords with their number of occurrences"""
    # Apostrophes are separators, so that "l'algorithme" counts as "algorithme"
    words = WORD.findall(text.lower())
    counts = collections.Counter(w for w in words if len(w) >= 3 and w not in STOPWORDS)
    keywords = sorted(counts.items(), key=lambda item: (-item[1], item[0]))
    keywords = [(word, count) for word, count in keywords if count >= min_count]

    return len(words), dict(keywords[:top] if top else keywords)


def process(video, args):
    """Updates the keywords of a video, returns True if its transcript had to be downloaded"""
    stored = None if args.refresh else find_transcript(video)

    if stored:
        path, lang = stored
        with open(path, encoding="utf-8") as f:
            text = f.read()
    else:
        text, lang = download_transcript(video)
        for old in glob.glob(os.path.join(glob.escape(TRANSCRIPTS), glob.escape(video) + ".*.txt")):
            os.remove(old)
        os.makedirs(TRANSCRIPTS, exist_ok=True)
        with open(os.path.join(TRANSCRIPTS, f"{video}.{lang}.txt"), "w", encoding="utf-8") as f:
            f.write(textwrap.fill(text, 100, break_long_words=False, break_on_hyphens=False) + "\n")

    words, keywords = build_keywords(text, args.top, args.min_count)

    os.makedirs(KEYWORDS, exist_ok=True)
    with open(os.path.join(KEYWORDS, f"{video}.json"), "w", encoding="utf-8") as f:
        json.dump(
            {"video": video, "language": lang, "words": words, "keywords": keywords},
            f,
            ensure_ascii=False,
            indent=2,
        )
        f.write("\n")

    origin = "stored transcript" if stored else "downloaded"
    print(f"* {video}: {len(keywords)} keywords out of {words} words ({lang}, {origin})", flush=True)

    return not stored


def main():
    parser = argparse.ArgumentParser(description="Retrieves the transcript of YouTube videos and builds their keywords")
    parser.add_argument("videos", nargs="+", metavar="video-id")
    parser.add_argument("--refresh", action="store_true", help="download the transcripts again, even if they are stored")
    parser.add_argument("--top", type=int, default=0, help="maximum number of keywords per video (default: no limit)")
    parser.add_argument("--min-count", type=int, default=1, help="minimum number of occurrences of a keyword (default: 1)")
    args = parser.parse_args()

    failed = []
    downloaded = False
    for video in args.videos:
        if downloaded:
            time.sleep(PAUSE)
        try:
            downloaded = process(video, args)
        except (RuntimeError, OSError, ValueError) as e:
            downloaded = True
            failed.append(video)
            print(f"* {video}: FAILED, {e}", file=sys.stderr)

    if failed:
        print(f"\n{len(failed)} video(s) failed: {' '.join(failed)}", file=sys.stderr)
        sys.exit(1)


if __name__ == "__main__":
    main()
