<?php

/* AcardFrontendBundle:_Partials:teasers.html.twig */
class __TwigTemplate_9caae9436655bfbaad93be24b0b09dab1b86f4ce63780893b2bcdfca297f2969 extends Twig_Template
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
        echo "<section class=\"m-teasers-container\">
    <div class=\"wrapper\">

        <div class=\"m-teaser-box pull-left\">
            <a href=\"\"><img src=\"";
        // line 5
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("/web/bundles/acardfrontend/img/box1.png"), "html", null, true);
        echo "\" alt=\"O nadciśnieniu tętniczym\"></a>
            <div class=\"m-teaser-box-desc\">
                <h2 class=\"m-teaser-box-title\">O nadciśnieniu tętniczym</h2>
                <p>
                    Regularna kontrola ciśnienia tętniczego stwarza możliwość wczesnego wykrycia i podjęcia odpowiedniego leczenia nadciśnienia tętniczego. Niewykryte bądź nieleczone nadciśnienie tętnicze zwiększa ryzyko wystąpienia zdarzeń sercowo-naczyniowych takich jak: zawał serca, udar mózgu, a także chorób nerek...
                </p>

                <a href=\"";
        // line 12
        echo $this->env->getExtension('routing')->getUrl("acard_frontend_page_view", array("pageUrl" => "nadcisnienie"));
        echo "\" class=\"btn read-more\"><span>Czytaj więcej</span></a>
            </div>
        </div>
        <div class=\"m-teaser-box pull-left\">
            <a href=\"\"><img src=\"";
        // line 16
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("/web/bundles/acardfrontend/img/box2.png"), "html", null, true);
        echo "\" alt=\"Acard\"></a>
            <div class=\"m-teaser-box-desc\">
                <h2 class=\"m-teaser-box-title\">Acard</h2>
                <p>
                    Lek ACARD zawiera kwas acetylosalicylowy, który hamuje zlepianie się (agregację) płytek krwi. Lek przeznaczony jest do długotrwałego, profilaktycznego stosowania w chorobach, które grożą powstaniem zakrzepów i zatorów w naczyniach krwionośnych.
                </p>

                <a href=\"";
        // line 23
        echo $this->env->getExtension('routing')->getUrl("acard_frontend_page_view", array("pageUrl" => "acard"));
        echo "\" class=\"btn read-more\"><span>Czytaj więcej</span></a>
            </div>
        </div>
    </div>
</section>";
    }

    public function getTemplateName()
    {
        return "AcardFrontendBundle:_Partials:teasers.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  49 => 23,  89 => 31,  80 => 28,  67 => 23,  58 => 20,  45 => 15,  34 => 11,  19 => 1,  135 => 31,  130 => 16,  125 => 14,  120 => 11,  115 => 10,  109 => 9,  103 => 32,  101 => 31,  95 => 28,  91 => 32,  86 => 25,  82 => 24,  78 => 27,  73 => 21,  69 => 24,  62 => 17,  60 => 16,  56 => 19,  52 => 23,  43 => 11,  35 => 12,  25 => 5,  50 => 7,  44 => 5,  38 => 15,  32 => 12,  64 => 7,  61 => 6,  55 => 11,  51 => 10,  47 => 16,  42 => 16,  39 => 10,  36 => 12,  30 => 3,);
    }
}
