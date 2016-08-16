<?php

/* AcardFrontendBundle:_Partials:header.html.twig */
class __TwigTemplate_acfa56f5d893871a4d7dc695b125a2813ad93e5570e5406df072d07270c7b935 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<header class=\"m-header\">
    <div class=\"wrapper\">
        <div class=\"brand col-sm-3\">
            <a href=\"/\">
                <img src=\"";
        // line 5
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/acardfrontend/img/logo.png"), "html", null, true);
        echo "\" alt=\"Ciśnienie na życie\">
            </a>
        </div>
        <nav id=\"main-nav\" class=\"pull-right\">
            <ul>
                <li>
                    ";
        // line 11
        $context["cssClass"] = ((($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "name") == "about")) ? ("current") : (""));
        // line 12
        echo "                    <a class=\"";
        echo twig_escape_filter($this->env, (isset($context["cssClass"]) ? $context["cssClass"] : null), "html", null, true);
        echo "\" href=\"";
        echo $this->env->getExtension('routing')->getPath("acard_frontend_page_view", array("pageUrl" => "o-kampanii"));
        echo "\">O kampanii</a>
                </li>
                <li>
                    ";
        // line 15
        $context["cssClass"] = ((($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "name") == "calendar")) ? ("current") : (""));
        // line 16
        echo "                    <a class=\"";
        echo twig_escape_filter($this->env, (isset($context["cssClass"]) ? $context["cssClass"] : null), "html", null, true);
        echo "\" href=\"";
        echo $this->env->getExtension('routing')->getPath("acard_frontend_page_view", array("pageUrl" => "kalendarium"));
        echo "\">Kalendarium badań</a>
                </li>
                <li>
                    ";
        // line 19
        $context["cssClass"] = ((($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "name") == "heart-age")) ? ("current") : (""));
        // line 20
        echo "                    <a class=\"";
        echo twig_escape_filter($this->env, (isset($context["cssClass"]) ? $context["cssClass"] : null), "html", null, true);
        echo "\" href=\"";
        echo $this->env->getExtension('routing')->getPath("acard_frontend_page_view", array("pageUrl" => "wiek-serca"));
        echo "\">Wiek serca</a>
                </li>
                <li>
                    ";
        // line 23
        $context["cssClass"] = ((($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "name") == "hypertension")) ? ("current") : (""));
        // line 24
        echo "                    <a class=\"";
        echo twig_escape_filter($this->env, (isset($context["cssClass"]) ? $context["cssClass"] : null), "html", null, true);
        echo "\" href=\"";
        echo $this->env->getExtension('routing')->getPath("acard_frontend_page_view", array("pageUrl" => "nadcisnienie"));
        echo "\">O nadciśnieniu</a>
                </li>
                <li>
                    ";
        // line 27
        $context["cssClass"] = ((($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "name") == "acard")) ? ("current") : (""));
        // line 28
        echo "                    <a class=\"";
        echo twig_escape_filter($this->env, (isset($context["cssClass"]) ? $context["cssClass"] : null), "html", null, true);
        echo "\" href=\"";
        echo $this->env->getExtension('routing')->getPath("acard_frontend_page_view", array("pageUrl" => "acard"));
        echo "\">Acard</a>
                </li>
                <li>
                    ";
        // line 31
        $context["cssClass"] = ((($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "name") == "contact")) ? ("current") : (""));
        // line 32
        echo "                    <a class=\"";
        echo twig_escape_filter($this->env, (isset($context["cssClass"]) ? $context["cssClass"] : null), "html", null, true);
        echo "\" href=\"";
        echo $this->env->getExtension('routing')->getPath("acard_frontend_page_view", array("pageUrl" => "kontakt"));
        echo "\">Kontakt</a>
                </li>
            </ul>
        </nav>
    </div>
</header>";
    }

    public function getTemplateName()
    {
        return "AcardFrontendBundle:_Partials:header.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  89 => 31,  80 => 28,  67 => 23,  58 => 20,  45 => 15,  34 => 11,  19 => 1,  135 => 31,  130 => 16,  125 => 14,  120 => 11,  115 => 10,  109 => 9,  103 => 32,  101 => 31,  95 => 28,  91 => 32,  86 => 25,  82 => 24,  78 => 27,  73 => 21,  69 => 24,  62 => 17,  60 => 16,  56 => 19,  52 => 14,  43 => 11,  35 => 9,  25 => 5,  50 => 7,  44 => 5,  38 => 4,  32 => 3,  64 => 7,  61 => 6,  55 => 11,  51 => 10,  47 => 16,  42 => 8,  39 => 10,  36 => 12,  30 => 3,);
    }
}
