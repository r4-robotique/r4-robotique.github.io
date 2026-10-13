#!/bin/bash
# Updates the keywords of all the events that have a video (see video_keywords.py)
# Transcripts that are already stored are not downloaded again, unless --refresh is passed

set -e
cd "$(dirname "$0")"

videos=$(php -r 'include "data/_events.php"; foreach (getVideoEvents() as $event) echo $event["youtube"], "\n";' | sort -u)

# The -- is needed, since video ids can start with a dash
./video_keywords.py "$@" -- $videos
