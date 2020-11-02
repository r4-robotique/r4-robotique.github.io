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
            'javascripts' => [$this, 'block_javascripts'],
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
\t\t<title>Réseau Régional de Recherche en Robotique - Nouvelle Aquitaine</title>

    <link rel=\"icon\" href=\"";
        // line 9
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('asset')->getCallable(), ["favicon.ico"]), "html", null, true);
        echo "\" />
\t\t<link rel=\"stylesheet\" type=\"text/css\" href=\"";
        // line 10
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('asset')->getCallable(), ["bootstrap/css/bootstrap.min.css"]), "html", null, true);
        echo "\"/>
\t\t<link rel=\"stylesheet\" type=\"text/css\" href=\"";
        // line 11
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('asset')->getCallable(), ["css/style.css"]), "html", null, true);
        echo "\"/>
    <link rel=\"stylesheet\" type=\"text/css\" href=\"";
        // line 12
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('asset')->getCallable(), ["js/leaflet.css"]), "html", null, true);
        echo "\"/>
    <link rel=\"stylesheet\" type=\"text/css\" href=\"";
        // line 13
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('asset')->getCallable(), ["js/cluster/dist/MarkerCluster.css"]), "html", null, true);
        echo "\"/>
    <link rel=\"stylesheet\" type=\"text/css\" href=\"";
        // line 14
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('asset')->getCallable(), ["js/cluster/dist/MarkerCluster.Default.css"]), "html", null, true);
        echo "\"/>
\t\t<link href=\"https://fonts.googleapis.com/css?family=Montserrat&amp;display=swap\" rel=\"stylesheet\">

    <script type=\"text/javascript\" src=\"";
        // line 17
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('asset')->getCallable(), ["js/jquery.min.js"]), "html", null, true);
        echo "\"></script>
    <script type=\"text/javascript\" src=\"";
        // line 18
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('asset')->getCallable(), ["js/leaflet.js"]), "html", null, true);
        echo "\"></script>
    <script type=\"text/javascript\" src=\"";
        // line 19
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('asset')->getCallable(), ["js/cluster/dist/leaflet.markercluster.js"]), "html", null, true);
        echo "\"></script>
    ";
        // line 20
        $this->displayBlock('javascripts', $context, $blocks);
        // line 21
        echo "\t</head>
\t<body>
\t\t\t<nav class=\"navbar navbar-expand-lg navbar-dark bg-dark mb-4\">
        <div class=\"container\">
\t\t\t\t<a class=\"navbar-brand\" href=\"#\">&nbsp;</a>
\t\t\t\t<button class=\"navbar-toggler\" type=\"button\" data-toggle=\"collapse\" data-target=\"#navbarSupportedContent\" aria-controls=\"navbarSupportedContent\" aria-expanded=\"false\" aria-label=\"Toggle navigation\">
\t\t\t\t\t<span class=\"navbar-toggler-icon\"></span>
\t\t\t\t</button>

\t\t\t\t<div class=\"collapse navbar-collapse\" id=\"navbarSupportedContent\">
\t\t\t\t\t<ul class=\"navbar-nav mr-auto\">
\t\t\t\t\t\t<li class=\"nav-item ";
        // line 32
        if ((($context["route"] ?? null) == "/")) {
            echo "active";
        }
        echo "\">
\t\t\t\t\t\t\t<a class=\"nav-link\" href=\"";
        // line 33
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('path')->getCallable(), ["/"]), "html", null, true);
        echo "\">Presentation</a>
\t\t\t\t\t\t</li>
\t\t\t\t\t\t<li class=\"nav-item ";
        // line 35
        if ((($context["route"] ?? null) == "/working-group")) {
            echo "active";
        }
        echo "\">
\t\t\t\t\t\t\t<a class=\"nav-link\" href=\"";
        // line 36
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('path')->getCallable(), ["/working-group"]), "html", null, true);
        echo "\">Working group</a>
\t\t\t\t\t\t</li>
\t\t\t\t\t\t";
        // line 44
        echo "            <li class=\"nav-item ";
        if ((($context["route"] ?? null) == "/contact")) {
            echo "active";
        }
        echo "\">
\t\t\t\t\t\t\t<a class=\"nav-link\" href=\"";
        // line 45
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('path')->getCallable(), ["/contact"]), "html", null, true);
        echo "\">Contact</a>
\t\t\t\t\t\t</li>
\t\t\t\t\t</ul>
\t\t\t\t</div>

        <a href=\"/\" class=\"navbar-brand\">
          <img src=\"";
        // line 51
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('asset')->getCallable(), ["img/logo-sm.png"]), "html", null, true);
        echo "\"/>
        </a>
        </div>
\t\t\t</nav>

    <div class=\"container\">

\t\t\t";
        // line 58
        $this->displayBlock('body', $context, $blocks);
        // line 59
        echo "
\t\t\t<hr/>

    <footer class=\"pb-5\">
        <center>
            <a href=\"https://www.u-bordeaux.fr/\" target=\"_blank\"><img src=\"";
        // line 64
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('asset')->getCallable(), ["img/ub.svg"]), "html", null, true);
        echo "\"/></a>
            <a href=\"https://www.bordeaux-inp.fr/\" target=\"_blank\"><img src=\"";
        // line 65
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('asset')->getCallable(), ["img/inp.png"]), "html", null, true);
        echo "\"/></a>
            <a href=\"https://www.inria.fr/en/centre-bordeaux-sud-ouest\" target=\"_blank\"><img src=\"";
        // line 66
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('asset')->getCallable(), ["img/inria.png"]), "html", null, true);
        echo "\"/></a>
            <a href=\"https://www.estia.fr/\" target=\"_blank\"><img src=\"";
        // line 67
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('asset')->getCallable(), ["img/estia.svg"]), "html", null, true);
        echo "\"/></a>
            <a href=\"https://www.univ-pau.fr/\" target=\"_blank\"><img src=\"";
        // line 68
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('asset')->getCallable(), ["img/pau.png"]), "html", null, true);
        echo "\"/></a>
            <a href=\"https://www.unilim.fr/\" target=\"_blank\"><img src=\"";
        // line 69
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('asset')->getCallable(), ["img/limoges.png"]), "html", null, true);
        echo "\"/></a>
            <a href=\"https://www.univ-poitiers.fr/\" target=\"_blank\"><img src=\"";
        // line 70
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('asset')->getCallable(), ["img/poitiers.jpeg"]), "html", null, true);
        echo "\"/></a>
            <a href=\"https://www.univ-larochelle.fr/\" target=\"_blank\"><img src=\"";
        // line 71
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('asset')->getCallable(), ["img/la-rochelle.png"]), "html", null, true);
        echo "\"/></a>
            <a href=\"https://artsetmetiers.fr/en/campus/bordeaux-talence\" target=\"_blank\"><img src=\"";
        // line 72
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('asset')->getCallable(), ["img/ensam.png"]), "html", null, true);
        echo "\"/></a>
        </center>
    </footer>
\t\t</div>

\t\t<script type=\"text/javascript\" src=\"";
        // line 77
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('asset')->getCallable(), ["bootstrap/js/jquery.min.js"]), "html", null, true);
        echo "\"></script>
\t\t<script type=\"text/javascript\" src=\"";
        // line 78
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('asset')->getCallable(), ["bootstrap/js/bootstrap.min.js"]), "html", null, true);
        echo "\"></script>
\t</body>
</html>
";
    }

    // line 20
    public function block_javascripts($context, array $blocks = [])
    {
        $macros = $this->macros;
    }

    // line 58
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
        return array (  217 => 58,  211 => 20,  203 => 78,  199 => 77,  191 => 72,  187 => 71,  183 => 70,  179 => 69,  175 => 68,  171 => 67,  167 => 66,  163 => 65,  159 => 64,  152 => 59,  150 => 58,  140 => 51,  131 => 45,  124 => 44,  119 => 36,  113 => 35,  108 => 33,  102 => 32,  89 => 21,  87 => 20,  83 => 19,  79 => 18,  75 => 17,  69 => 14,  65 => 13,  61 => 12,  57 => 11,  53 => 10,  49 => 9,  39 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "base.html.twig", "/home/gregwar/robotique.labri.fr/web/templates/base.html.twig");
    }
}
