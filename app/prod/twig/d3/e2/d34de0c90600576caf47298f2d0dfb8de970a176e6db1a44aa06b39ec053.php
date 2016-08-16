<?php

/* AcardFrontendBundle:_Partials:map.html.twig */
class __TwigTemplate_d3e2d34de0c90600576caf47298f2d0dfb8de970a176e6db1a44aa06b39ec053 extends Twig_Template
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
        echo "<section class=\"m-map-container\">
    <div id=\"map\"></div>
    <div class=\"wrapper mapwrapper\">
        <div class=\"m-check-events\">
            <div class=\"m-check-events-header\">
                Sprawdź kalendarium<br>
                badań w Twoim regionie
            </div>
            <div class=\"m-check-events-elem\">
                <b><span class=\"violet\">Bądz na bieżąco z naszymi wydarzeniami.</span><br>
                    Zapraszamy do zapoznania się z mapą aktualnych<br>
                    i planowanych wydarzeń.</b>

                <div class=\"formbox dropdown-holder\">
                    <div class=\"selectBox\">
                        <input name=\"\" value=\"\" type=\"hidden\">
                        <span class=\"selected\" data-placeholder='Województwo'></span>
                        <span class=\"selectArrow\"></span>

                        <div class=\"selectOptionsWrapper\">
                            <div class=\"selectOptions\" id='provinces'>
                                ";
        // line 22
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["provinces"]) ? $context["provinces"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["province"]) {
            // line 23
            echo "                                    <span data-value=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["province"]) ? $context["province"] : null), "name"), "html", null, true);
            echo "\"
                                          class=\"selectOption selectOptionProvince\">";
            // line 24
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["province"]) ? $context["province"] : null), "label"), "html", null, true);
            echo "</span>
                                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['province'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 26
        echo "                            </div>
                        </div>
                    </div>

                    <div class=\"selectBox\">
                        <input name=\"\" value=\"\" type=\"hidden\">
                        <span class=\"selected\" data-placeholder='Miasto' id='cityLabel'></span>
                        <span class=\"selectArrow\"></span>

                        <div class=\"selectOptionsWrapper\">
                            <div class=\"selectOptions\" id='cities'>
                            </div>
                        </div>
                    </div>


                    <p class=\"light-grey\">Aktualnie przeprowadzamy pomiary ciśnienia tętniczego na terenie kraju. Nawyk
                        regularnej kontroli ciśnienia krwi, to jeden z najlepszych sposobów uniknięcia schorzeń układu
                        krążenia.</p>
                </div>
            </div>
        </div>
    </div>
</section>";
    }

    public function getTemplateName()
    {
        return "AcardFrontendBundle:_Partials:map.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  59 => 26,  46 => 23,  49 => 23,  89 => 31,  80 => 28,  67 => 23,  58 => 20,  45 => 15,  34 => 11,  19 => 1,  135 => 31,  130 => 16,  125 => 14,  120 => 11,  115 => 10,  109 => 9,  103 => 32,  101 => 31,  95 => 28,  91 => 32,  86 => 25,  82 => 24,  78 => 27,  73 => 21,  69 => 24,  62 => 17,  60 => 16,  56 => 19,  52 => 23,  43 => 11,  35 => 12,  25 => 5,  50 => 7,  44 => 5,  38 => 15,  32 => 12,  64 => 7,  61 => 6,  55 => 11,  51 => 24,  47 => 16,  42 => 22,  39 => 10,  36 => 12,  30 => 3,);
    }
}
