<?php

/* display/export/options_output_separate_files.twig */
class __TwigTemplate_d192a941072f63c1417147d18a72acfd1be959dfeba4f6d74aa1198427bf6711 extends Twig_Template
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
        echo '<li>
    <input type="checkbox" id="checkbox_as_separate_files"
        name="as_separate_files" value="';
        // line 3
        echo twig_escape_filter($this->env, ($context['export_type'] ?? null), 'html', null, true);
        echo '"';
        // line 4
        echo (($context['is_checked'] ?? null)) ? (' checked') : ('');
        echo '>
    <label for="checkbox_as_separate_files">
        ';
        // line 6
        if ((($context['export_type'] ?? null) == 'server')) {
            // line 7
            echo '            ';
            echo _gettext('Export databases as separate files');
            // line 8
            echo '        ';
        } elseif ((($context['export_type'] ?? null) == 'database')) {
            // line 9
            echo '            ';
            echo _gettext('Export tables as separate files');
            // line 10
            echo '        ';
        }
        // line 11
        echo '    </label>
</li>
';
    }

    public function getTemplateName()
    {
        return 'display/export/options_output_separate_files.twig';
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return [45 => 11,  42 => 10,  39 => 9,  36 => 8,  33 => 7,  31 => 6,  26 => 4,  23 => 3,  19 => 1];
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source('', 'display/export/options_output_separate_files.twig', '/var/www/html/openrsc_web/public/sql/templates/display/export/options_output_separate_files.twig');
    }
}
