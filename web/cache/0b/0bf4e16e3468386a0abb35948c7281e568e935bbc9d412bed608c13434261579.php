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

/* presse.html.twig */
class __TwigTemplate_1e329ea3b76ecaae4fe47ddcd9b973511769cb0419ac72b432f6cdd2fea93c59 extends \Twig\Template
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
        $this->parent = $this->loadTemplate("base.html.twig", "presse.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_body($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 4
        echo "
\t";
        // line 5
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["presse"] ?? null));
        foreach ($context['_seq'] as $context["year"] => $context["entries"]) {
            // line 6
            echo "\t\t<center>
\t\t\t<h3 class=\"text-muted mt-4\">";
            // line 7
            echo twig_escape_filter($this->env, $context["year"], "html", null, true);
            echo "</h3>
\t\t</center>
\t\t<div class=\"list-group\">
\t\t\t";
            // line 10
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($context["entries"]);
            $context['loop'] = [
              'parent' => $context['_parent'],
              'index0' => 0,
              'index'  => 1,
              'first'  => true,
            ];
            if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof \Countable)) {
                $length = count($context['_seq']);
                $context['loop']['revindex0'] = $length - 1;
                $context['loop']['revindex'] = $length;
                $context['loop']['length'] = $length;
                $context['loop']['last'] = 1 === $length;
            }
            foreach ($context['_seq'] as $context["_key"] => $context["entry"]) {
                // line 11
                echo "\t\t\t\t<a href=\"";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["entry"], "url", [], "any", false, false, false, 11), "html", null, true);
                echo "\" target=\"_blank\" class=\"list-group-item list-group-item-action
                ";
                // line 12
                if (((twig_get_attribute($this->env, $this->source, $context["loop"], "index", [], "any", false, false, false, 12) % 2) == 0)) {
                    echo "bg-grey";
                }
                // line 13
                echo "                \">
\t\t\t\t\t<div class=\"d-flex w-100\">
\t\t\t\t\t\t";
                // line 15
                if (twig_get_attribute($this->env, $this->source, $context["entry"], "img", [], "any", false, false, false, 15)) {
                    // line 16
                    echo "\t\t\t\t\t\t\t<div class=\"training-img\">
\t\t\t\t\t\t\t\t<img src=\"";
                    // line 17
                    echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('asset')->getCallable(), [("img/presse/" . twig_get_attribute($this->env, $this->source, $context["entry"], "img", [], "any", false, false, false, 17))]), "html", null, true);
                    echo "\"/>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t";
                }
                // line 20
                echo "\t\t\t\t\t\t<div class=\"w-100\">

\t\t\t\t\t\t\t<div class=\"d-flex w-100 justify-content-between\">
\t\t\t\t\t\t\t\t<div>
\t\t\t\t\t\t\t\t\t<h5 class=\"mb-1\">
\t\t\t\t\t\t\t\t\t\t";
                // line 25
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["entry"], "title", [], "any", false, false, false, 25), "html", null, true);
                echo "
\t\t\t\t\t\t\t\t\t</h5>

\t\t\t\t\t\t\t\t\t<p class=\"mb-1 text-muted\">
\t\t\t\t\t\t\t\t\t\t";
                // line 29
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["entry"], "media", [], "any", false, false, false, 29), "html", null, true);
                echo "
\t\t\t\t\t\t\t\t\t</p>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t<small>
\t\t\t\t\t\t\t\t\t";
                // line 33
                if (twig_get_attribute($this->env, $this->source, $context["entry"], "month", [], "any", false, false, false, 33)) {
                    // line 34
                    echo "\t\t\t\t\t\t\t\t\t\t";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["entry"], "month", [], "any", false, false, false, 34), "html", null, true);
                    echo "
\t\t\t\t\t\t\t\t\t";
                }
                // line 36
                echo "                                    
\t\t\t\t\t\t\t\t\t";
                // line 37
                if ((twig_in_filter("video", $context["entry"]) && twig_get_attribute($this->env, $this->source, $context["entry"], "video", [], "any", false, false, false, 37))) {
                    // line 38
                    echo "\t\t\t\t\t\t\t\t\t\t<br/>
\t\t\t\t\t\t\t\t\t\t<center><img class=\"presse-logo\" src=\"";
                    // line 39
                    echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('asset')->getCallable(), ["img/video.png"]), "html", null, true);
                    echo "\"/></center>
                                    ";
                } elseif ((twig_in_filter("audio",                 // line 40
$context["entry"]) && twig_get_attribute($this->env, $this->source, $context["entry"], "audio", [], "any", false, false, false, 40))) {
                    // line 41
                    echo "\t\t\t\t\t\t\t\t\t\t<br/>
\t\t\t\t\t\t\t\t\t\t<center><img class=\"presse-logo\" src=\"";
                    // line 42
                    echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('asset')->getCallable(), ["img/audio.png"]), "html", null, true);
                    echo "\"/></center>
\t\t\t\t\t\t\t\t\t";
                }
                // line 44
                echo "\t\t\t\t\t\t\t\t</small>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t</a>
\t\t\t";
                ++$context['loop']['index0'];
                ++$context['loop']['index'];
                $context['loop']['first'] = false;
                if (isset($context['loop']['length'])) {
                    --$context['loop']['revindex0'];
                    --$context['loop']['revindex'];
                    $context['loop']['last'] = 0 === $context['loop']['revindex0'];
                }
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['entry'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 50
            echo "\t\t</div>
\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['year'], $context['entries'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 52
        echo "
";
    }

    public function getTemplateName()
    {
        return "presse.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  184 => 52,  177 => 50,  158 => 44,  153 => 42,  150 => 41,  148 => 40,  144 => 39,  141 => 38,  139 => 37,  136 => 36,  130 => 34,  128 => 33,  121 => 29,  114 => 25,  107 => 20,  101 => 17,  98 => 16,  96 => 15,  92 => 13,  88 => 12,  83 => 11,  66 => 10,  60 => 7,  57 => 6,  53 => 5,  50 => 4,  46 => 3,  35 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "presse.html.twig", "/home/gregwar/robotique.labri.fr/web/templates/presse.html.twig");
    }
}
