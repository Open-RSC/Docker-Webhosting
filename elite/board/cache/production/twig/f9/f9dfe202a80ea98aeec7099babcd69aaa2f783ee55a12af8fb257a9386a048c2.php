<?php

/* @phpbbmodders_banhammer/event/overall_footer_after.html */
class __TwigTemplate_65d43b1b58bb1dad735aff7054910b987830f1f6598de20e960197e38adb8529 extends Twig_Template
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
        if (($context["S_SHOW_BH"] ?? null)) {
            // line 2
            echo "<script type=\"text/javascript\">
(function(\$){  // Avoid conflicts with other libraries
\t'use strict';
\t\$('.bh-click').click(
\tfunction() {
\t\t\$('#bh-options').toggle('slow');
\t});

\t\$(\".bh_hover\").hover(
\tfunction() {
\t\t\$(this).css('background-color', '#ecf3f7')
\t},
\tfunction() {
\t\t\$(this).css('background-color', '')
\t});
})(jQuery);
</script>
";
        }
    }

    public function getTemplateName()
    {
        return "@phpbbmodders_banhammer/event/overall_footer_after.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  21 => 2,  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "@phpbbmodders_banhammer/event/overall_footer_after.html", "");
    }
}
