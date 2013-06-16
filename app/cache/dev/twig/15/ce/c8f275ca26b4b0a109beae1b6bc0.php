<?php

/* AcmeSearchBundle:Clip:create.html.twig */
class __TwigTemplate_15cec8f275ca26b4b0a109beae1b6bc0 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("AcmeSearchBundle::layout.html.twig");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'content_header' => array($this, 'block_content_header'),
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "AcmeSearchBundle::layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        echo "Symfony - Welcome";
    }

    // line 5
    public function block_content_header($context, array $blocks = array())
    {
        echo "";
    }

    // line 7
    public function block_content($context, array $blocks = array())
    {
        // line 8
        echo "        <h3>Create Clip</h3>
        <form class='cForm' action=\"\" method=\"post\" ";
        // line 9
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getContext($context, "form"), 'enctype');
;
        echo ">
            ";
        // line 10
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getContext($context, "form"), 'errors');
        echo "
            <div style=\"overflow: hidden; clear: both\">
                <div style=\"float: left\">

                    ";
        // line 14
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form"), "url"), 'errors');
        echo "
                    ";
        // line 15
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form"), "url"), 'label');
        echo "
                    ";
        // line 16
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form"), "url"), 'widget');
        echo "
                </div>
                <div id=\"loadYouTubeVideo\" style=\"float: left; margin-left: 10px\" class=\"btn btn-green\">Load</div>
                <div style=\"float: right; margin-right: 40px\">

                    ";
        // line 21
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form"), "tags"), 'errors');
        echo "
                    ";
        // line 22
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form"), "tags"), 'label');
        echo "
                    ";
        // line 23
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form"), "tags"), 'widget');
        echo "
                </div>
            </div>
            <div style=\"overflow: hidden; clear: both\">
                <div class=\"video-block hide\">
                    <div id=\"youTubeIframe\" style=\"text-align: center\">

                    </div>
                    <div id=\"slider-range\"></div>
                </div>
                <div style=\"float: left;\">

                    ";
        // line 35
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form"), "time_start"), 'errors');
        echo "
                    ";
        // line 36
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form"), "time_start"), 'label');
        echo "
                    ";
        // line 37
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form"), "time_start"), 'widget');
        echo "
                </div>
                <div style=\"float: right; margin-right: 40px\">

                    ";
        // line 41
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form"), "time_end"), 'errors');
        echo "
                    ";
        // line 42
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form"), "time_end"), 'label');
        echo "
                    ";
        // line 43
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form"), "time_end"), 'widget');
        echo "
                </div>
            </div>
            <div>

                ";
        // line 48
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form"), "description"), 'errors');
        echo "
                ";
        // line 49
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form"), "description"), 'label');
        echo "
                ";
        // line 50
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form"), "description"), 'widget');
        echo "
            </div>

                ";
        // line 53
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getContext($context, "form"), "_token"), 'widget');
        echo "


                <input type=\"submit\" class=\"btn btn-green\"/>

        </form>

    ";
    }

    public function getTemplateName()
    {
        return "AcmeSearchBundle:Clip:create.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  144 => 53,  138 => 50,  134 => 49,  130 => 48,  122 => 43,  118 => 42,  114 => 41,  107 => 37,  103 => 36,  99 => 35,  84 => 23,  80 => 22,  76 => 21,  68 => 16,  64 => 15,  60 => 14,  53 => 10,  48 => 9,  45 => 8,  42 => 7,  36 => 5,  30 => 3,);
    }
}
