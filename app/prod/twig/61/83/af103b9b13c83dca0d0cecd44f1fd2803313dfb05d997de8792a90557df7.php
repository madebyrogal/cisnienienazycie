<?php

/* AcardFrontendBundle:_Partials:mainpage_boxes.html.twig */
class __TwigTemplate_6183af103b9b13c83dca0d0cecd44f1fd2803313dfb05d997de8792a90557df7 extends Twig_Template
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
        echo "<section class=\"m-wideinfo-bg\">
    <div class=\"wrapper m-teasers-container\">
        <div class=\"m-teaser-box pull-left\">
            <div class=\"m-teaser-box-desc\">
                <h2 class=\"m-teaser-box-title\">Kampania ciśnienie na życie</h2>
                <a href=\"\"><img src=\"";
        // line 6
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/acardfrontend/img/box3.jpg"), "html", null, true);
        echo "\" alt=\"Kampania ciśnienie na życie\"></a>
                <p>
                    Przeprowadzenie 200 000 pomiarów ciśnienia tętniczego, wsparcie obchodów Światowego Dnia Serca i sporządzenie raportu na temat czynników ryzyka chorób układu krążenia – to tylko niektórez zadań ogólnopolskiej kampanii społecznej \"Ciśnienie na życie\", organizowanej przez Grupę Polpharma.
                </p>

                <a href=\"";
        // line 11
        echo $this->env->getExtension('routing')->getUrl("acard_frontend_page_view", array("pageUrl" => "about"));
        echo "\" class=\"btn read-more\"><span>Czytaj więcej</span></a>
            </div>
        </div>
        <div class=\"m-movies-container pull-right\">

            <div class=\"m-movies-select\">
                ";
        // line 17
        echo $this->env->getExtension('http_kernel')->renderFragment($this->env->getExtension('http_kernel')->controller("AcardFrontendBundle:Video:mainPageVideos"));
        echo "

            </div>

            <div id=\"player\"></div>
            <div class=\"controlBar\">
                <div class=\"progressBar\"><div class=\"drag\"></div></div>
                <div class=\"volumeControl pull-right\">
                    <img src=\"";
        // line 25
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/acardfrontend/img/volumeup.png"), "html", null, true);
        echo "\" id=\"volumeup\" alt=\"Zwiększ głośność\">
                    <img src=\"";
        // line 26
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/acardfrontend/img/volumedown.png"), "html", null, true);
        echo "\" id=\"volumedown\" alt=\"Zmniejsz głośność\">
                </div>
            </div>

        </div>
    </div>
</section>";
    }

    public function getTemplateName()
    {
        return "AcardFrontendBundle:_Partials:mainpage_boxes.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  54 => 25,  26 => 6,  59 => 26,  46 => 23,  49 => 23,  89 => 31,  80 => 28,  67 => 23,  58 => 26,  45 => 15,  34 => 11,  19 => 1,  135 => 31,  130 => 16,  125 => 14,  120 => 11,  115 => 10,  109 => 9,  103 => 32,  101 => 31,  95 => 28,  91 => 32,  86 => 25,  82 => 24,  78 => 27,  73 => 21,  69 => 24,  62 => 17,  60 => 16,  56 => 19,  52 => 23,  43 => 17,  35 => 12,  25 => 5,  50 => 7,  44 => 5,  38 => 15,  32 => 12,  64 => 7,  61 => 6,  55 => 11,  51 => 24,  47 => 16,  42 => 22,  39 => 10,  36 => 12,  30 => 3,);
    }
}
