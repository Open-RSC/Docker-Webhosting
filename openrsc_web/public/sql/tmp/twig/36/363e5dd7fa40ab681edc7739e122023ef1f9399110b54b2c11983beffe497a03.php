<?php

/* fk_checkbox.twig */
class __TwigTemplate_bc8749edcffaca71e03afd6f72aa34667f3571ccb5f55b3f465cdd2be1663fae extends Twig_Template
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
        echo '<input type="hidden" name="fk_checks" value="0">
<input type="checkbox" name="fk_checks" id="fk_checks" value="1"';
        // line 3
        echo (($context['checked'] ?? null)) ? (' checked') : ('');
        echo '>
<label for="fk_checks">';
        // line 4
        echo _gettext('Enable foreign key checks');
        echo '</label>
';
    }

    public function getTemplateName()
    {
        return 'fk_checkbox.twig';
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return [26 => 4,  22 => 3,  19 => 1];
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source('', 'fk_checkbox.twig', '/var/www/html/openrsc_web/public/sql/templates/fk_checkbox.twig');
    }
}
