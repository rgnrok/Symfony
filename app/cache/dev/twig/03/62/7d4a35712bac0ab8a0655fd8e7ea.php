<?php

/* AcmeSearchBundle:Clip:list.html.twig */
class __TwigTemplate_03627d4a35712bac0ab8a0655fd8e7ea extends Twig_Template
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
        echo "        <h3>Clips list</h3>
     <table class=\"table table-striped table-bordered \">
         <thead>
             <tr>
                <th>Id</th>
                <th>Url</th>
                <th>Time Start</th>
                <th>Time End</th>
                <th>Tags</th>
             </tr>
         </thead>
         <tbody>
         ";
        // line 20
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, "clips"));
        foreach ($context['_seq'] as $context["_key"] => $context["clip"]) {
            // line 21
            echo "            <tr>
                <td>";
            // line 22
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "clip"), "getId", array(), "method"), "html", null, true);
            echo "</td>
                <td>";
            // line 23
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "clip"), "getUrl", array(), "method"), "html", null, true);
            echo "</td>
                <td>";
            // line 24
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "clip"), "getTimeStart", array(), "method"), "html", null, true);
            echo "</td>
                <td>";
            // line 25
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "clip"), "getTimeEnd", array(), "method"), "html", null, true);
            echo "</td>
                <td>";
            // line 26
            echo twig_escape_filter($this->env, twig_join_filter($this->getAttribute($this->getContext($context, "clip"), "getTagsName", array(), "method"), ", "), "html", null, true);
            echo "</td>
            </tr>
             ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['clip'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 29
        echo "         </tbody>
     </table>

    ";
    }

    public function getTemplateName()
    {
        return "AcmeSearchBundle:Clip:list.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  91 => 29,  82 => 26,  78 => 25,  74 => 24,  70 => 23,  66 => 22,  63 => 21,  59 => 20,  45 => 8,  42 => 7,  36 => 5,  30 => 3,);
    }
}
