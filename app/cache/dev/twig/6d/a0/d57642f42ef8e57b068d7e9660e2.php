<?php

/* AcmeSearchBundle:Tag:list.html.twig */
class __TwigTemplate_6da0d57642f42ef8e57b068d7e9660e2 extends Twig_Template
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
        echo "        <h3>Tags list</h3>
     <table class=\"table table-striped table-bordered \">
         <thead>
             <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Clips count</th>
             </tr>
         </thead>
         <tbody>
         ";
        // line 18
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, "tags"));
        foreach ($context['_seq'] as $context["_key"] => $context["tag"]) {
            // line 19
            echo "            <tr>
                <td>";
            // line 20
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "tag"), "tag_id"), "html", null, true);
            echo "</td>
                <td>";
            // line 21
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "tag"), "tag_name"), "html", null, true);
            echo "</td>
                <td>";
            // line 22
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "tag"), "clips_count"), "html", null, true);
            echo "</td>
            </tr>
             ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['tag'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 25
        echo "         </tbody>
     </table>

    ";
    }

    public function getTemplateName()
    {
        return "AcmeSearchBundle:Tag:list.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  81 => 25,  72 => 22,  68 => 21,  64 => 20,  61 => 19,  57 => 18,  45 => 8,  42 => 7,  36 => 5,  30 => 3,);
    }
}
