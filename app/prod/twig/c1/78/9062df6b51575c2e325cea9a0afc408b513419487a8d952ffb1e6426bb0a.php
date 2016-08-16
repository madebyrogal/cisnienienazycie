<?php

/* AcardFrontendBundle:_Partials:stats_mainpage.html.twig */
class __TwigTemplate_c1789062df6b51575c2e325cea9a0afc408b513419487a8d952ffb1e6426bb0a extends Twig_Template
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
        echo "<section class=\"m-kv kv-large clearfix\">
    <div class=\"wrapper dt\">

        <div class=\"col-sm-6 pull-left m-kv-intro\">
            <h1 class=\"claim pull-left\">kampania<br>ciśnienia na życie</h1>
            <p>
                W ramach kampanii  „Ciśnienia na życie” możesz dokonać bezpłatnego pomiaru ciśnienia krwi.
                Pojedynczy pomiar trwa ok. 3 minut, a może przedłużyć życie o całe lata!

                <b>Sprawdź terminy akcji w Twojej miejscowości</b>
            </p>
            <a href=\"";
        // line 12
        echo $this->env->getExtension('routing')->getUrl("acard_frontend_page_view", array("pageUrl" => "calendar"));
        echo "\" class=\"btn kv-btn\"><span>Kalendarium badań</span></a>
        </div>
        <div class=\"pull-right text-right m-kv-counter\">
            <img src=\"";
        // line 15
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("/web/bundles/acardfrontend/img/counter.png"), "html", null, true);
        echo "\" alt=\"Przebadane serca\">
            <div class=\"m-kv-counter-intro\">
                Przebadanych serc
            </div>
            <div class=\"m-kv-counter-about\">
                Sponsorem kampanii jest Polfa<br>
                Warszawa Grupa Polpharma

                <img src=\"";
        // line 23
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("/web/bundles/acardfrontend/img/acard-logo.png"), "html", null, true);
        echo "\" alt=\"Acard\">
            </div>
        </div>
    </div>
</section>";
    }

    public function getTemplateName()
    {
        return "AcardFrontendBundle:_Partials:stats_mainpage.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  49 => 23,  89 => 31,  80 => 28,  67 => 23,  58 => 20,  45 => 15,  34 => 11,  19 => 1,  135 => 31,  130 => 16,  125 => 14,  120 => 11,  115 => 10,  109 => 9,  103 => 32,  101 => 31,  95 => 28,  91 => 32,  86 => 25,  82 => 24,  78 => 27,  73 => 21,  69 => 24,  62 => 17,  60 => 16,  56 => 19,  52 => 14,  43 => 11,  35 => 9,  25 => 5,  50 => 7,  44 => 5,  38 => 15,  32 => 12,  64 => 7,  61 => 6,  55 => 11,  51 => 10,  47 => 16,  42 => 8,  39 => 10,  36 => 12,  30 => 3,);
    }
}
