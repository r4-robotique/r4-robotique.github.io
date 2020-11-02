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

/* groupe-de-travail.html.twig */
class __TwigTemplate_604eb8085e9efb519767c00d7e2d49dde8f291ec5ee3400bd9ee35c3348b8e8a extends \Twig\Template
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
        $this->parent = $this->loadTemplate("base.html.twig", "groupe-de-travail.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_body($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 4
        echo "
\t<div class=\"intro\">
\t\t<b>ASPIC</b>:
\t\t<em>Autonomous System, Pereption Interaction and Control</em>
\t</div>

\t<center>
\t\t<div class=\"date-big\">
\t\t\t<div class=\"date\">
\t\t\t\t<div class=\"date-img\">
\t\t\t\t\t<img src=\"";
        // line 14
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('asset')->getCallable(), ["img/cal.png"]), "html", null, true);
        echo "\"/>
\t\t\t\t</div>
\t\t\t\t<div class=\"date-text\">
\t\t\t\t\t<a href=\"http://aspic.labri.fr/ical.php\">
\t\t\t\t\t\tSynchronisez votre agenda avec l'ICAL suivant:
\t\t\t\t\t</a><br/>
\t\t\t\t\t<kbd>http://robotique.labri.fr/ical.php</kbd><br/>
\t\t\t\t\tEt/ou inscrivez vous à la
\t\t\t\t\t<a target=\"_blank\" href=\"https://diff.u-bordeaux.fr/sympa/info/labri.aspic\">
\t\t\t\t\t\tliste de diffusion
\t\t\t\t\t</a>
\t\t\t\t</div>
\t\t\t</div>
\t\t</div>
\t</center>

\t";
        // line 30
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["events"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["event"]) {
            // line 31
            echo "\t\t<div class=\"card m-2
                        ";
            // line 32
            if ((twig_date_format_filter($this->env, "now", "U") > twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, $context["event"], "date_end", [], "any", false, false, false, 32), "U"))) {
                // line 33
                echo "                        inactive
                        ";
            }
            // line 34
            echo "\">
\t\t\t<div class=\"card-body\">
\t\t\t\t<h5 class=\"card-title\">
\t\t\t\t\t";
            // line 37
            echo twig_get_attribute($this->env, $this->source, $context["event"], "title", [], "any", false, false, false, 37);
            echo "
\t\t\t\t</h5>
\t\t\t\t";
            // line 39
            if (twig_get_attribute($this->env, $this->source, $context["event"], "speakers", [], "any", false, false, false, 39)) {
                // line 40
                echo "\t\t\t\t\t<em>
\t\t\t\t\t\t";
                // line 41
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["event"], "speakers", [], "any", false, false, false, 41), "html", null, true);
                echo "
\t\t\t\t\t</em>
\t\t\t\t";
            }
            // line 44
            echo "\t\t\t\t";
            if (twig_get_attribute($this->env, $this->source, $context["event"], "visio", [], "array", true, true, false, 44)) {
                // line 45
                echo "\t\t\t\t\t";
                if (twig_get_attribute($this->env, $this->source, $context["event"], "speakers", [], "any", false, false, false, 45)) {
                    echo "<br/>
\t\t\t\t\t";
                }
                // line 47
                echo "\t\t\t\t\t<em>
\t\t\t\t\t\t<a href=\"";
                // line 48
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["event"], "visio", [], "any", false, false, false, 48), "html", null, true);
                echo "\">Accéder à la visio</a>
\t\t\t\t\t\t(<a href=\"https://renavisio.renater.fr/user_guide?lang=fr\">aide</a>)
\t\t\t\t\t</em>
\t\t\t\t";
            }
            // line 52
            echo "
\t\t\t\t";
            // line 53
            if (twig_get_attribute($this->env, $this->source, $context["event"], "docs", [], "any", false, false, false, 53)) {
                // line 54
                echo "\t\t\t\t\t<br/>
\t\t\t\t\t<em>
\t\t\t\t\t\t";
                // line 56
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["event"], "docs", [], "any", false, false, false, 56));
                foreach ($context['_seq'] as $context["file"] => $context["doc"]) {
                    // line 57
                    echo "\t\t\t\t\t\t\t<img src=\"";
                    echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('asset')->getCallable(), ["img/download.png"]), "html", null, true);
                    echo "\"/>
\t\t\t\t\t\t\t<a target=\"_blank\" href=\"";
                    // line 58
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
                // line 61
                echo "\t\t\t\t\t</em>
\t\t\t\t";
            }
            // line 63
            echo "\t\t\t</div>
\t\t\t<div class=\"card-footer\">
\t\t\t\t<div class=\"row\">
\t\t\t\t\t<div class=\"col-sm-8\">
\t\t\t\t\t\t<div class=\"date\">
\t\t\t\t\t\t\t<div class=\"date-img mr-2\"><img src=\"";
            // line 68
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('asset')->getCallable(), ["img/calendar.png"]), "html", null, true);
            echo "\"></div>
\t\t\t\t\t\t\t<div class=\"date-text\">
                                ";
            // line 70
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, $context["event"], "date_start", [], "any", false, false, false, 70), "d M Y"), "html", null, true);
            echo "<br/>
                                ";
            // line 71
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, $context["event"], "date_start", [], "any", false, false, false, 71), "H:i"), "html", null, true);
            echo "h&rarr;";
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, $context["event"], "date_end", [], "any", false, false, false, 71), "H:i"), "html", null, true);
            echo "h
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"col-sm-4 text-right\">
\t\t\t\t\t\t";
            // line 76
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["event"], "where", [], "any", false, false, false, 76), "html", null, true);
            echo "
\t\t\t\t\t\t<img class=\"ml-2\" src=\"";
            // line 77
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
        // line 83
        echo "
";
    }

    public function getTemplateName()
    {
        return "groupe-de-travail.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  209 => 83,  197 => 77,  193 => 76,  183 => 71,  179 => 70,  174 => 68,  167 => 63,  163 => 61,  152 => 58,  147 => 57,  143 => 56,  139 => 54,  137 => 53,  134 => 52,  127 => 48,  124 => 47,  118 => 45,  115 => 44,  109 => 41,  106 => 40,  104 => 39,  99 => 37,  94 => 34,  90 => 33,  88 => 32,  85 => 31,  81 => 30,  62 => 14,  50 => 4,  46 => 3,  35 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "groupe-de-travail.html.twig", "/home/gregwar/robotique.labri.fr/web/templates/groupe-de-travail.html.twig");
    }
}
