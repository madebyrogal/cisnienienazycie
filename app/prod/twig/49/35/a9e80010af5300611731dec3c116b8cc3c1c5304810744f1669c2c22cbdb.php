<?php

/* AcardFrontendBundle:Page:view_main.html.twig */
class __TwigTemplate_4935a9e80010af5300611731dec3c116b8cc3c1c5304810744f1669c2c22cbdb extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("AcardFrontendBundle::layout.html.twig");

        $this->blocks = array(
            'body_css_class' => array($this, 'block_body_css_class'),
            'body' => array($this, 'block_body'),
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "AcardFrontendBundle::layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_body_css_class($context, array $blocks = array())
    {
        echo "home-page";
    }

    // line 5
    public function block_body($context, array $blocks = array())
    {
        // line 6
        echo "    ";
        $this->displayBlock('content', $context, $blocks);
        // line 8
        echo "    ";
        echo twig_include($this->env, $context, "AcardFrontendBundle:_Partials:stats_mainpage.html.twig", array());
        echo "
    ";
        // line 9
        echo twig_include($this->env, $context, "AcardFrontendBundle:_Partials:teasers.html.twig", array());
        echo "
    ";
        // line 10
        echo twig_include($this->env, $context, "AcardFrontendBundle:_Partials:map.html.twig", array());
        echo "
    ";
        // line 11
        echo twig_include($this->env, $context, "AcardFrontendBundle:_Partials:mainpage_boxes.html.twig", array());
        echo "
";
    }

    // line 6
    public function block_content($context, array $blocks = array())
    {
        // line 7
        echo "    ";
    }

    public function getTemplateName()
    {
        return "AcardFrontendBundle:Page:view_main.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  64 => 7,  61 => 6,  55 => 11,  51 => 10,  47 => 9,  42 => 8,  39 => 6,  36 => 5,  30 => 3,);
    }
}
