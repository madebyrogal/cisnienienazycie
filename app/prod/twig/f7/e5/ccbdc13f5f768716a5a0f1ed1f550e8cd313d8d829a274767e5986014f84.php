<?php

/* ::base.html.twig */
class __TwigTemplate_f7e5ccbdc13f5f768716a5a0f1ed1f550e8cd313d8d829a274767e5986014f84 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'meta_description' => array($this, 'block_meta_description'),
            'meta_keywords' => array($this, 'block_meta_keywords'),
            'body_css_class' => array($this, 'block_body_css_class'),
            'body' => array($this, 'block_body'),
            'javascripts' => array($this, 'block_javascripts'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<!--[if lt IE 7]>      <html class=\"no-js lt-ie9 lt-ie8 lt-ie7\"> <![endif]-->
<!--[if IE 7]>         <html class=\"no-js lt-ie9 lt-ie8\"> <![endif]-->
<!--[if IE 8]>         <html class=\"no-js lt-ie9\"> <![endif]-->
<!--[if gt IE 8]><!--> <html class=\"no-js \"> <!--<![endif]-->
<head>
    <meta charset=\"utf-8\">
    <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge,chrome=1\">
    <title>";
        // line 9
        $this->displayBlock('title', $context, $blocks);
        echo "</title>
    <meta name=\"description\" content=\"";
        // line 10
        $this->displayBlock('meta_description', $context, $blocks);
        echo "\">
    <meta name=\"keywords\" content=\"";
        // line 11
        $this->displayBlock('meta_keywords', $context, $blocks);
        echo "\">
    <link rel=\"stylesheet\" href=\"";
        // line 12
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/acardfrontend/css/main.css"), "html", null, true);
        echo "\">
</head>
<body class=\"";
        // line 14
        $this->displayBlock('body_css_class', $context, $blocks);
        echo "\">
    ";
        // line 15
        echo twig_include($this->env, $context, "AcardFrontendBundle:_Partials:header.html.twig", array());
        echo "
    ";
        // line 16
        $this->displayBlock('body', $context, $blocks);
        // line 17
        echo "    ";
        echo twig_include($this->env, $context, "AcardFrontendBundle:_Partials:footer.html.twig", array());
        echo "

    <script src=\"http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js\"></script>
    <script src=\"";
        // line 20
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/acardfrontend/js/vendor/bootstrap.min.js"), "html", null, true);
        echo "\"></script>
    <script src=\"";
        // line 21
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/acardfrontend/js/vendor/jquery.mCustomScrollbar.min.js"), "html", null, true);
        echo "\"></script>
    <script type=\"text/javascript\" src=\"http://maps.google.com/maps/api/js?sensor=true\"></script>
    <script src=\"";
        // line 23
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/acardfrontend/js/vendor/infoBubble.js"), "html", null, true);
        echo "\"></script>
    <script src=\"";
        // line 24
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/acardfrontend/js/vendor/jquery.nyroModal.custom.min.js"), "html", null, true);
        echo "\"></script>
    <script src=\"";
        // line 25
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/acardfrontend/js/main.js"), "html", null, true);
        echo "\"></script>
    <!--[if lte IE 8]>
    <script src=\"";
        // line 27
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/acardfrontend/js/vendor/html5shiv.js"), "html", null, true);
        echo "\"></script>
    <script src=\"";
        // line 28
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/acardfrontend/js/vendor/selectivizr-min.js"), "html", null, true);
        echo "\"></script>
    <script src=\"http://ie7-js.googlecode.com/svn/version/2.1(beta4)/IE8.js\"></script>
    <![endif]-->
    ";
        // line 31
        $this->displayBlock('javascripts', $context, $blocks);
        // line 32
        echo "</body>
</html>
";
    }

    // line 9
    public function block_title($context, array $blocks = array())
    {
        echo "Ciśnienie na życie";
    }

    // line 10
    public function block_meta_description($context, array $blocks = array())
    {
    }

    // line 11
    public function block_meta_keywords($context, array $blocks = array())
    {
    }

    // line 14
    public function block_body_css_class($context, array $blocks = array())
    {
    }

    // line 16
    public function block_body($context, array $blocks = array())
    {
    }

    // line 31
    public function block_javascripts($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "::base.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  135 => 31,  130 => 16,  125 => 14,  120 => 11,  115 => 10,  109 => 9,  103 => 32,  101 => 31,  95 => 28,  91 => 27,  86 => 25,  82 => 24,  78 => 23,  73 => 21,  69 => 20,  62 => 17,  60 => 16,  56 => 15,  52 => 14,  43 => 11,  35 => 9,  25 => 1,  50 => 7,  44 => 5,  38 => 4,  32 => 3,  64 => 7,  61 => 6,  55 => 11,  51 => 10,  47 => 12,  42 => 8,  39 => 10,  36 => 5,  30 => 3,);
    }
}
