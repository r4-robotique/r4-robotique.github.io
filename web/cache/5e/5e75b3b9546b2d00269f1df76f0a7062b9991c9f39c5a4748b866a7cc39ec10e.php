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

/* base.html.twig */
class __TwigTemplate_a964715ec6aa76bce8ef71af0d0491f376e79c0b3902584516a5406def0de970 extends \Twig\Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
            'body' => [$this, 'block_body'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 1
        echo "<!DOCTYPE html>
<html lang=\"en\">
\t<head>
\t\t<meta charset=\"UTF-8\">
\t\t<meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
\t\t<meta http-equiv=\"X-UA-Compatible\" content=\"ie=edge\">
\t\t<title>Robotique</title>

\t\t<link rel=\"stylesheet\" type=\"text/css\" href=\"";
        // line 9
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('asset')->getCallable(), ["bootstrap/css/bootstrap.min.css"]), "html", null, true);
        echo "\"/>
\t\t<link rel=\"stylesheet\" type=\"text/css\" href=\"";
        // line 10
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('asset')->getCallable(), ["css/style.css"]), "html", null, true);
        echo "\"/>
\t\t<link href=\"https://fonts.googleapis.com/css?family=Montserrat&display=swap\" rel=\"stylesheet\">
\t</head>
\t<body>
\t\t<div class=\"container\">
\t\t\t<center class=\"title\">
                Plateformes pour la recherche robotique bordelaise
\t\t\t</center>

\t\t\t<nav class=\"navbar navbar-expand-lg navbar-dark bg-dark mb-4\">
\t\t\t\t<a class=\"navbar-brand\" href=\"#\">&nbsp;</a>
\t\t\t\t<button class=\"navbar-toggler\" type=\"button\" data-toggle=\"collapse\" data-target=\"#navbarSupportedContent\" aria-controls=\"navbarSupportedContent\" aria-expanded=\"false\" aria-label=\"Toggle navigation\">
\t\t\t\t\t<span class=\"navbar-toggler-icon\"></span>
\t\t\t\t</button>

\t\t\t\t<div class=\"collapse navbar-collapse\" id=\"navbarSupportedContent\">
\t\t\t\t\t<ul class=\"navbar-nav mr-auto\">
\t\t\t\t\t\t<li class=\"nav-item ";
        // line 27
        if ((($context["route"] ?? null) == "/")) {
            echo "active";
        }
        echo "\">
\t\t\t\t\t\t\t<a class=\"nav-link\" href=\"";
        // line 28
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('path')->getCallable(), ["/"]), "html", null, true);
        echo "\">Plateformes</a>
\t\t\t\t\t\t</li>
\t\t\t\t\t\t<li class=\"nav-item ";
        // line 30
        if ((($context["route"] ?? null) == "/formations")) {
            echo "active";
        }
        echo "\">
\t\t\t\t\t\t\t<a class=\"nav-link\" href=\"";
        // line 31
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('path')->getCallable(), ["/formations"]), "html", null, true);
        echo "\">Formations</a>
\t\t\t\t\t\t</li>
\t\t\t\t\t\t<li class=\"nav-item ";
        // line 33
        if ((($context["route"] ?? null) == "/groupe-de-travail")) {
            echo "active";
        }
        echo "\">
\t\t\t\t\t\t\t<a class=\"nav-link\" href=\"";
        // line 34
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('path')->getCallable(), ["/groupe-de-travail"]), "html", null, true);
        echo "\">Groupe de travail \"ASPIC\"</a>
\t\t\t\t\t\t</li>
\t\t\t\t\t\t<li class=\"nav-item\">
\t\t\t\t\t\t\t<a class=\"nav-link\" href=\"#\">Presse</a>
\t\t\t\t\t\t</li>
\t\t\t\t\t</ul>
\t\t\t\t</div>
\t\t\t</nav>

\t\t\t";
        // line 43
        $this->displayBlock('body', $context, $blocks);
        // line 44
        echo "
\t\t\t<hr/>

\t\t\t<footer>
\t\t\t\t<center>
\t\t\t\t\t<a href=\"#\"><img width=\"150\" src=\"";
        // line 49
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('asset')->getCallable(), ["img/ub.svg"]), "html", null, true);
        echo "\"/></a>
\t\t\t\t\t<a href=\"#\"><img width=\"150\" src=\"";
        // line 50
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('asset')->getCallable(), ["img/inp.png"]), "html", null, true);
        echo "\"/></a>
\t\t\t\t\t<a href=\"#\"><img width=\"150\" src=\"";
        // line 51
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('asset')->getCallable(), ["img/aquitaine_robotics.svg"]), "html", null, true);
        echo "\"/></a>
                    <a href=\"#\"><img width=\"150\" src=\"";
        // line 52
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('asset')->getCallable(), ["img/ims.png"]), "html", null, true);
        echo "\"/></a>
\t\t\t\t</center>
\t\t\t</footer>
\t\t</div>

\t\t<script type=\"text/javascript\" src=\"";
        // line 57
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('asset')->getCallable(), ["bootstrap/js/jquery.min.js"]), "html", null, true);
        echo "\"></script>
\t\t<script type=\"text/javascript\" src=\"";
        // line 58
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('asset')->getCallable(), ["bootstrap/js/bootstrap.min.js"]), "html", null, true);
        echo "\"></script>
\t</body>
</html>
";
    }

    // line 43
    public function block_body($context, array $blocks = [])
    {
        $macros = $this->macros;
    }

    public function getTemplateName()
    {
        return "base.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  153 => 43,  145 => 58,  141 => 57,  133 => 52,  129 => 51,  125 => 50,  121 => 49,  114 => 44,  112 => 43,  100 => 34,  94 => 33,  89 => 31,  83 => 30,  78 => 28,  72 => 27,  52 => 10,  48 => 9,  38 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "base.html.twig", "/home/gregwar/robotique.labri.fr/templates/base.html.twig");
    }
}
