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

/* formations.html.twig */
class __TwigTemplate_ea47d4dc74f6dea2bd8b4e380dead79de83c4ab9fcd826be29786739c8c56423 extends \Twig\Template
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
        $this->parent = $this->loadTemplate("base.html.twig", "formations.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_body($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 4
        echo "
\t<div class=\"intro\">
\t\tVoici la liste des formations robotique disponibles sur le campus universitaires de
\t\t        Bordeaux.
\t</div>

\t<div class=\"list-group\">
\t\t<a href=\"#\" class=\"list-group-item list-group-item-action\">
            <div class=\"d-flex w-100\">
                <div class=\"training-img\">
                <img src=\"";
        // line 14
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('asset')->getCallable(), ["img/small-iut.png"]), "html", null, true);
        echo "\" />
                </div>
                <div>
                    <div class=\"d-flex w-100 justify-content-between\">
                        <h5 class=\"mb-1\">Parcours robotique de l'IUT</h5>
                        <small>BAC+2</small>
                    </div>
                    <p class=\"mb-1\">
                        En intégrant le département GMP, GEII, Informatique ou MP de l'IUT de Bordeaux, il est possible
                        pour les étudiants de candidater pour participer au parcours robotique multi-départements.
                    </p>
                    <small></small>
                </div>
            </div>
\t\t</a>
\t\t<a href=\"https://www.u-bordeaux.fr/formation/2018/PRMA_68/informatique\" target=\"_blank\" class=\"list-group-item list-group-item-action\">
            <div class=\"d-flex w-100\">
                <div class=\"training-img\">
                    <img src=\"";
        // line 32
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('asset')->getCallable(), ["img/small-ub.png"]), "html", null, true);
        echo "\" />
                </div>
                <div>
                    <div class=\"d-flex w-100 justify-content-between\">
                        <h5 class=\"mb-1\">Master ASPIC</h5>
                        <small class=\"text-muted\">BAC+5</small>
                    </div>
                    <p class=\"mb-1\">
                        Le Master ASPIC (<em>Autonomous Systems, Perception, Interaction and Control</em>) est une spécialité
                        de Master 2 atteignable dans l'UF informatique de la faculté de Bordeaux.<br/>
                        Elle se focalise sur la perception (traitement d'images), le contrôle de drones et de robots mobiles.
                    </p>
                </div>
            </div>
\t\t</a>
\t\t<a href=\"https://ccc.bordeaux-inp.fr/syllabus/index.php?annee=2019&mode=consultation&chemin=60100_60062_60061_59949_59625&langue=1\" target=\"_blank\" class=\"list-group-item list-group-item-action\">
            <div class=\"d-flex w-100\">
                <div class=\"training-img\">
                    <img src=\"";
        // line 50
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('asset')->getCallable(), ["img/small-inp.png"]), "html", null, true);
        echo "\" />
                </div>
                <div>
                    <div class=\"d-flex w-100 justify-content-between\">
                        <h5 class=\"mb-1\">Option robotique et apprentissage (ENSEIRB-MATMECA)</h5>
                        <small class=\"text-muted\">BAC+5</small>
                    </div>
                    <p class=\"mb-1\">
                        L'option robotique est apprentissage est une spécialité d'ingénierie, ouverte aux étudiants de
                        Bordeaux INP (ENSEIRB-MATMECA, ENSC).
                    </p>
                    </div>
            </div>
\t\t</a>
\t</div>

";
    }

    public function getTemplateName()
    {
        return "formations.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  104 => 50,  83 => 32,  62 => 14,  50 => 4,  46 => 3,  35 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "formations.html.twig", "/home/gregwar/robotique.labri.fr/templates/formations.html.twig");
    }
}
