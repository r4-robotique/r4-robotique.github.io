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

/* contact.html.twig */
class __TwigTemplate_47bec6703aa5c4ca89091b20f355913a245a9a0bb808262f9911ee507ae64ff1 extends \Twig\Template
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
        $this->parent = $this->loadTemplate("base.html.twig", "contact.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_body($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 4
        echo "
<h3>Working group / Workshop</h3>

<ul>
    <li>I want to join the mailing list (<u>r4-nouvelle-aquitaine@diff.u-bordeaux.fr</u>)</li>
    <li>I have question/suggestion about the working group</li>
    <li>I have a suggestion of talk or speaker</li>
    <li>I want to give a presentation</li>
</ul>

<h4>
&rarr; You can contact <a href=\"mailto:gregoire.passault@u-bordeaux.fr\">Grégoire Passault</a>
</h4>

<hr/>

<h3>
    More general questions about the R4 network
</h3>

<ul>
    <li>I have questions about the network structure itself</li>
    <li>I want to propose a new partnership with the network</li>
    <li>I want to get my lab in the network</li>
</ul>

<h4>
&rarr; You can contact <a href=\"mailto:olivier.ly@u-bordeaux.fr\">Olivier Ly</a>
</h4>

";
    }

    public function getTemplateName()
    {
        return "contact.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  50 => 4,  46 => 3,  35 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "contact.html.twig", "/home/gregwar/robotique.labri.fr/web/templates/contact.html.twig");
    }
}
