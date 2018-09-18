<?php

/* @phpbb_mediaembed/event/acp_overall_footer_after.html */
class __TwigTemplate_897f93905deeaeb20100a5f0f28fa0ad76a73ca36844674f7379eb79188c9166 extends Twig_Template
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
        if (($context["MEDIA_SITES"] ?? null)) {
            // line 2
            echo "<script>
\t\$(function() {
\t\t\$('#mediaembed_manage').on('click', 'label', function() {
\t\t\tif (\$(this).children('input').prop('disabled')) {
\t\t\t\tphpbb.alert('";
            // line 6
            echo twig_escape_filter($this->env, $this->env->getExtension('phpbb\template\twig\extension')->lang("GENERAL_ERROR"), "js");
            echo "', \$(this).attr('title'));
\t\t\t}
\t\t});
\t});
</script>
";
        }
    }

    public function getTemplateName()
    {
        return "@phpbb_mediaembed/event/acp_overall_footer_after.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  27 => 6,  21 => 2,  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "@phpbb_mediaembed/event/acp_overall_footer_after.html", "");
    }
}
