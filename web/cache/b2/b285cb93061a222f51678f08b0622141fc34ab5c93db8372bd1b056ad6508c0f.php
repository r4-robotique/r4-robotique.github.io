<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* working-group.html.twig */
class __TwigTemplate_66222596d2e9016b6c4555e3b394900a9261e3d7266f03e0297d006db68290be extends \Twig\Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'body' => [$this, 'block_body'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return "base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $this->parent = $this->loadTemplate("base.html.twig", "working-group.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_body($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 4
        echo "
\t<div class=\"intro\">
\t\tWorking group mainly occurs on <strong>Monday, at 1pm (french time)</strong>.
\t</div>

\t<center>
\t\t<div class=\"date-big\">
\t\t\t<div class=\"date\">
\t\t\t\t<div class=\"date-img\">
\t\t\t\t\t<img src=\"";
        // line 13
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('asset')->getCallable(), ["img/cal.png"]), "html", null, true);
        echo "\"/>
\t\t\t\t</div>
\t\t\t\t<div class=\"date-text\">
\t\t\t\t\t<a href=\"http://aspic.labri.fr/ical.php\">
            You can get your agenda on sync using the following ICAL:
\t\t\t\t\t</a><br/>
\t\t\t\t\t<kbd>http://robotique.labri.fr/ical.php</kbd>
          <br/>

          And/or by subscribing to the <a href=\"";
        // line 22
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('path')->getCallable(), ["/contact"]), "html", null, true);
        echo "\">mailing list</a>.
\t\t\t\t</div>
\t\t\t</div>
\t\t</div>
\t</center>

\t";
        // line 28
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["events"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["event"]) {
            // line 29
            echo "\t\t<div class=\"card m-2
                        ";
            // line 30
            if ((twig_date_format_filter($this->env, "now", "U") > twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, $context["event"], "date_end", [], "any", false, false, false, 30), "U"))) {
                // line 31
                echo "                        inactive
                        ";
            }
            // line 32
            echo "\">
\t\t\t<div class=\"card-body\">
\t\t\t\t<h5 class=\"card-title\">
\t\t\t\t\t";
            // line 35
            echo twig_get_attribute($this->env, $this->source, $context["event"], "title", [], "any", false, false, false, 35);
            echo "
\t\t\t\t</h5>
\t\t\t\t";
            // line 37
            if (twig_get_attribute($this->env, $this->source, $context["event"], "speakers", [], "any", false, false, false, 37)) {
                // line 38
                echo "\t\t\t\t\t<em>
\t\t\t\t\t\t";
                // line 39
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["event"], "speakers", [], "any", false, false, false, 39), "html", null, true);
                echo "
\t\t\t\t\t</em>
\t\t\t\t";
            }
            // line 42
            echo "\t\t\t\t";
            if (twig_get_attribute($this->env, $this->source, $context["event"], "visio", [], "array", true, true, false, 42)) {
                // line 43
                echo "\t\t\t\t\t";
                if (twig_get_attribute($this->env, $this->source, $context["event"], "speakers", [], "any", false, false, false, 43)) {
                    echo "<br/>
\t\t\t\t\t";
                }
                // line 45
                echo "\t\t\t\t\t<em>
\t\t\t\t\t\t<a href=\"";
                // line 46
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["event"], "visio", [], "any", false, false, false, 46), "html", null, true);
                echo "\">Accéder à la visio</a>
\t\t\t\t\t\t(<a href=\"https://renavisio.renater.fr/user_guide?lang=fr\">aide</a>)
\t\t\t\t\t</em>
\t\t\t\t";
            }
            // line 50
            echo "
\t\t\t\t";
            // line 51
            if (twig_get_attribute($this->env, $this->source, $context["event"], "docs", [], "any", false, false, false, 51)) {
                // line 52
                echo "\t\t\t\t\t<br/>
\t\t\t\t\t<em>
\t\t\t\t\t\t";
                // line 54
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["event"], "docs", [], "any", false, false, false, 54));
                foreach ($context['_seq'] as $context["file"] => $context["doc"]) {
                    // line 55
                    echo "\t\t\t\t\t\t\t<img src=\"";
                    echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('asset')->getCallable(), ["img/download.png"]), "html", null, true);
                    echo "\"/>
\t\t\t\t\t\t\t<a target=\"_blank\" href=\"";
                    // line 56
                    echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('asset')->getCallable(), [("files/" . $context["file"])]), "html", null, true);
                    echo "\">";
                    echo twig_escape_filter($this->env, $context["doc"], "html", null, true);
                    echo "</a>
\t\t\t\t\t\t\t<br/>
\t\t\t\t\t\t";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['file'], $context['doc'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 59
                echo "\t\t\t\t\t</em>
\t\t\t\t";
            }
            // line 61
            echo "\t\t\t</div>
\t\t\t<div class=\"card-footer\">
\t\t\t\t<div class=\"row\">
\t\t\t\t\t<div class=\"col-sm-8\">
\t\t\t\t\t\t<div class=\"date\">
\t\t\t\t\t\t\t<div class=\"date-img mr-2\"><img src=\"";
            // line 66
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('asset')->getCallable(), ["img/calendar.png"]), "html", null, true);
            echo "\"></div>
\t\t\t\t\t\t\t<div class=\"date-text\">
                                ";
            // line 68
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, $context["event"], "date_start", [], "any", false, false, false, 68), "d M Y"), "html", null, true);
            echo "<br/>
                                ";
            // line 69
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, $context["event"], "date_start", [], "any", false, false, false, 69), "H:i"), "html", null, true);
            echo "h&rarr;";
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, $context["event"], "date_end", [], "any", false, false, false, 69), "H:i"), "html", null, true);
            echo "h
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"col-sm-4 text-right\">
\t\t\t\t\t\t";
            // line 74
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["event"], "where", [], "any", false, false, false, 74), "html", null, true);
            echo "
\t\t\t\t\t\t<img class=\"ml-2\" src=\"";
            // line 75
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('asset')->getCallable(), ["img/house.png"]), "html", null, true);
            echo "\">
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t</div>
\t\t</div>
\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['event'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 81
        echo "
";
    }

    public function getTemplateName()
    {
        return "working-group.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  210 => 81,  198 => 75,  194 => 74,  184 => 69,  180 => 68,  175 => 66,  168 => 61,  164 => 59,  153 => 56,  148 => 55,  144 => 54,  140 => 52,  138 => 51,  135 => 50,  128 => 46,  125 => 45,  119 => 43,  116 => 42,  110 => 39,  107 => 38,  105 => 37,  100 => 35,  95 => 32,  91 => 31,  89 => 30,  86 => 29,  82 => 28,  73 => 22,  61 => 13,  50 => 4,  46 => 3,  35 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "working-group.html.twig", "/home/gregwar/robotique.labri.fr/web/templates/working-group.html.twig");
    }
}
