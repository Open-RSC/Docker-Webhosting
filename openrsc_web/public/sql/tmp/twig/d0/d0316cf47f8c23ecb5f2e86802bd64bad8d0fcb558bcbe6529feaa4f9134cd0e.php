<?php

/* display/results/empty_display.twig */
class __TwigTemplate_e0d5203e5c83dc69595d08849f3042e9f4276488fdf0497169a595c98a83f33e extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        // line 1
        echo '<td ';
        echo twig_escape_filter($this->env, ($context['align'] ?? null), 'html', null, true);
        echo ' class="';
        echo twig_escape_filter($this->env, ($context['classes'] ?? null), 'html', null, true);
        echo '"></td>
';
    }

    public function getTemplateName()
    {
        return 'display/results/empty_display.twig';
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return [19 => 1];
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source('', 'display/results/empty_display.twig', '/var/www/html/openrsc_web/public/sql/templates/display/results/empty_display.twig');
    }
}
