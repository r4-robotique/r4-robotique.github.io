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

/* index.html.twig */
class __TwigTemplate_729ee043739e1c9cff870378225fd253dfb55561c44d8384894686e5228ce469 extends \Twig\Template
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
        $this->parent = $this->loadTemplate("base.html.twig", "index.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_body($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 4
        echo "
\t<div class=\"intro\">
        Voici la liste des plateformes robotiques développées et maintenues par des acteurs du
        campus universitaire de Bordeaux.
    </div>

\t<div class=\"row platforms\">

        ";
        // line 12
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["plateformes"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["plateforme"]) {
            // line 13
            echo "\t\t<div class=\"col-12 col-sm-6 col-lg-4 align-items-stretch d-flex\">
\t\t\t<div class=\"card m-2 platform-card\">
\t\t\t\t<img src=\"";
            // line 15
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('asset')->getCallable(), [("img/" . twig_get_attribute($this->env, $this->source, $context["plateforme"], "img", [], "any", false, false, false, 15))]), "html", null, true);
            echo "\" class=\"card-img-top\" alt=\"Sigmaban\">
\t\t\t\t<div class=\"card-body\">
\t\t\t\t\t<h5 class=\"card-title\">";
            // line 17
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["plateforme"], "name", [], "any", false, false, false, 17), "html", null, true);
            echo "</h5>
\t\t\t\t\t<p class=\"card-text\">
\t\t\t\t\t\t";
            // line 19
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["plateforme"], "description", [], "any", false, false, false, 19), "html", null, true);
            echo "
\t\t\t\t\t</p>
\t\t\t\t</div>
                <div class=\"card-footer\">
\t\t\t\t\t<a href=\"#\" class=\"float-right btn btn-primary\">Plus d'informations &rarr;</a>
                </div>
\t\t\t</div>
\t\t</div>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['plateforme'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 28
        echo "
\t</div>

";
    }

    public function getTemplateName()
    {
        return "index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  93 => 28,  78 => 19,  73 => 17,  68 => 15,  64 => 13,  60 => 12,  50 => 4,  46 => 3,  35 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "index.html.twig", "/home/gregwar/robotique.labri.fr/templates/index.html.twig");
    }
}
