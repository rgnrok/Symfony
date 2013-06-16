<?php

/* AcmeSearchBundle::base.html.twig */
class __TwigTemplate_d5a296e4c57087d84baf3c876a6facd4 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'head' => array($this, 'block_head'),
            'body' => array($this, 'block_body'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<html xmlns=\"http://www.w3.org/1999/html\">
<head>
    <meta http-equiv=\"Content-Type\" content=\"text/html; charset=";
        // line 4
        echo twig_escape_filter($this->env, $this->env->getCharset(), "html", null, true);
        echo "\"/>
    <meta name=\"robots\" content=\"noindex,nofollow\" />
    <title>";
        // line 6
        $this->displayBlock('title', $context, $blocks);
        echo "</title>
    <link href=\"";
        // line 7
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/framework/css/structure.css"), "html", null, true);
        echo "\" rel=\"stylesheet\" type=\"text/css\" media=\"all\" />
    <link href=\"";
        // line 8
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/framework/css/body.css"), "html", null, true);
        echo "\" rel=\"stylesheet\" type=\"text/css\" media=\"all\" />
    <link href=\"";
        // line 9
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/custom/css/bootstrap.css"), "html", null, true);
        echo "\" rel=\"stylesheet\" type=\"text/css\" media=\"all\" />
    <link href=\"";
        // line 10
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/custom/css/custom.css"), "html", null, true);
        echo "\" rel=\"stylesheet\" type=\"text/css\" media=\"all\" />
    <link href=\"";
        // line 11
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/custom/css/jquery-ui-1.10.3.custom.min.css"), "html", null, true);
        echo "\" rel=\"stylesheet\" type=\"text/css\" media=\"all\" />

    <script src=\"";
        // line 13
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/custom/js/jquery-1.10.1.min.js"), "html", null, true);
        echo "\" type=\"text/javascript\" media=\"all\" ></script>
    <script src=\"";
        // line 14
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/custom/js/jquery.kwicks.js"), "html", null, true);
        echo "\" type=\"text/javascript\" media=\"all\" ></script>
    <script src=\"";
        // line 15
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/custom/js/js.js"), "html", null, true);
        echo "\" type=\"text/javascript\" media=\"all\" ></script>
    <script src=\"";
        // line 16
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/custom/js/jquery-ui-1.10.3.custom.min.js"), "html", null, true);
        echo "\" type=\"text/javascript\" media=\"all\" ></script>
    ";
        // line 17
        $this->displayBlock('head', $context, $blocks);
        // line 18
        echo "</head>
<body>
<div class=\"page-wrapper\">


<div id=\"content\">


    <div class=\"main-menu\">
        ";
        // line 27
        echo $this->env->getExtension('knp_menu')->render("AcmeSearchBundle:Builder:mainMenu");
        echo "
        <div class=\"header-logo\">
            <img src=\"data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAALYAAAA+CAMAAACxzRGDAAAAUVBMVEX////Ly8yko6WLioxkYmVXVVkwLjLl5eWxsLJKSEzy8vJxcHLY2Ni+vb89Oz9XVVh+fH+Yl5n///+xsbLY2Nlxb3KkpKWXlph+fX+LiYy+vr/IZP61AAAAAXRSTlMAQObYZgAABRBJREFUeNrVmtuWoyAQRS1FEEQSzQU7//+hYxUiXsKQZLJWM+chsUloN+WhCuguYoKyYqzmvGasKqH4HyRKxndipcgcumH8qViTM7TkUclcwaHmf5XM0eWq4km1KjdqXfMXJHVe1J3hL8lk5fCGv6wmT+o0d87U+XNrk0Y9nfv+7LM6ZJH5ZBL6LAbSxQ3Q5FDr22Skr8PQSy4n7isnsQxSX4r6pobhjCHHeDNOKrO3yGmCvZOjV9jmt8ulTdXFKdbKLNh+kOMvBzuVRa4Y7MUsdEUSWQe7xxCfZmcwjHU83LqzFvSbJQOXQvptbPnEFoyZtUUGwTeKuLuTHyT1kaP0P6cR01OKvv448gtl61dqZfmJezQmU/t+1R2fJLtBwXV6uWGwB9SZPrn0fKO2WAvQN1PUhHjTom3xgXYTkvlSKHs19OhslETq6X3HrXbjt8XbGj9b4Gi+lUAnL6XxQj8Pyk9N4Bt1xUrsLVN/3isYMug8rODMdbgOvoHs8uAb2fcANIAzkKCLYy+AXRpSU8sr1r4P67xhLgPp7vM32zlqt7Bhq2fI1Hwp+VgANxok59SsGV3oqdUL0YVDMRY7Yg8QLbVUU4NZNoOq5hJHuxEM28Sh/IyUZ8D3reR+yc58EGvOy2U0HQL6G9V+kWyEWHmzaMx6t4o9RhOm/riUiYrzqij4Ptqkn7AaCXqc+F47m04ahfde7YIz8RHEBN6BdVwdIGRVdNbKqYu1Hc0x0wBY4wqC8+XUgBGnj81SZsQB+0yAS1x/BlI/6ebHHk0lauQLuPDpu6EwAVJ7T0rl2uXa23jcqNyOZekhqYHRz3JOANrF4wCCmEs1f9D1lUe0n4NAATed80Y5e0Q7CO2TezM/BR6wKdgQzKbCF4uOQC3Bk0fKAzbFlyRWg3gksA/gmm7eOjrpaKX7fHlEW2xLbE6GZsPiCiShVzN7RG2xTz2G+OJtEqzdJ7APxy3MrSsV0VukXbKMp9lhs5BN6dr3CN+sySUaoxGwfRUM3I/gdPYONgVU+PLX4vUWm32AvUySarbONvcpV2RQEPKKjEBHFk01kQDGRblnn8ZuE9g+JUl8OWAPbkFK2K6JxhJVvF47FzYYnAN22ttwxKYCoH36rheEB7KG/HF/YUaa2G5JF+55tpyrl7B1WHM39HuP2N2EXPl1UBu8vbj4OjvD+NoTE4ssF+ScARgaJY1N7+u8bY/Y9BSM5PKwJbvMVab32YP5FB5TtcYVrGoASolVLTzI7kVsYVxRtAb5n2JXq1vCdtd47XtYItynrN0835PasLg0y13aOPbmPI+on2Lr9e5tjSHvgkAvclUjL3Fsdaw03IzgTR62yYClk7QMah4IQ0qSsoYYbOix6zJR1ZGDNMOY3Bb6W5S6jiyovep3t7bUPyoq7OkjYumrfESp8zSBc/OLosVf+nTnnKjsqR16++WDwpI8FxJWRFTlI6NKnqYJaL96TqjAbo9Toi5QiWBDcmfdFV+T8dkvFe5bItgstbM2X6QG2mVun+cazfRwOS0eiaeRRJKgLfc3BQAqfnhJyz8lfR6580SF/FXVu83Nz1xrrnFqqXL6Qxl47DNSm4RFflvN5sABDD8peouqLLKQXVdGbnqf+qIpOxON4ZyYdJEJ6sy4zS2c5eRPTT4Jyp46qDE5/ptAWqJOQ9e6yE82FXBbZCk1/tXVoshVoopE3CB0zmraI3nbqCJ/gW3ZMgtbC5nh/QHlOoOZBxQCRgAAAABJRU5ErkJggg==\" alt=\"Symfony\" />
        </div>
    </div>

    <div class=\"sf-reset\">
        ";
        // line 34
        $this->displayBlock('body', $context, $blocks);
        // line 35
        echo "    </div>
</div>
</div>

</body>
</html>
";
    }

    // line 6
    public function block_title($context, array $blocks = array())
    {
    }

    // line 17
    public function block_head($context, array $blocks = array())
    {
    }

    // line 34
    public function block_body($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "AcmeSearchBundle::base.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  108 => 6,  98 => 35,  86 => 27,  69 => 16,  65 => 15,  57 => 13,  52 => 11,  40 => 8,  32 => 6,  27 => 4,  22 => 1,  113 => 17,  106 => 20,  96 => 34,  94 => 19,  91 => 18,  88 => 17,  81 => 29,  79 => 28,  75 => 18,  73 => 17,  70 => 16,  61 => 14,  58 => 12,  50 => 10,  44 => 9,  33 => 3,  144 => 53,  138 => 50,  134 => 49,  130 => 48,  122 => 43,  118 => 34,  114 => 41,  107 => 37,  103 => 19,  99 => 35,  84 => 23,  80 => 22,  76 => 21,  68 => 16,  64 => 15,  60 => 14,  53 => 11,  48 => 10,  45 => 8,  42 => 7,  36 => 7,  30 => 3,);
    }
}
