<?php

/* acp_phpbb_mediaembed_settings.html */
class __TwigTemplate_986506ce802cfcbf9e941d799a322f181e663ca24f3c33683b580ea77e6a6a11 extends Twig_Template
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
        $this->loadTemplate("overall_header.html", "acp_phpbb_mediaembed_settings.html", 1)->display($context);
        // line 2
        echo "
<h1>";
        // line 3
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("ACP_MEDIA_SETTINGS");
        echo "</h1>

<p>";
        // line 5
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("ACP_MEDIA_SETTINGS_EXPLAIN");
        echo "</p>

<form id=\"mediaembed_settings\" method=\"post\" action=\"";
        // line 7
        echo ($context["U_ACTION"] ?? null);
        echo "\">
\t<fieldset>
\t\t<dl>
\t\t\t<dt><label for=\"media_embed_bbcode\">";
        // line 10
        echo ($this->env->getExtension('phpbb\template\twig\extension')->lang("ACP_MEDIA_DISPLAY_BBCODE") . $this->env->getExtension('phpbb\template\twig\extension')->lang("COLON"));
        echo "</label><br /><span>";
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("ACP_MEDIA_DISPLAY_BBCODE_EXPLAIN");
        echo "</span></dt>
\t\t\t<dd><label><input type=\"radio\" class=\"radio\" name=\"media_embed_bbcode\" id=\"media_embed_bbcode\" value=\"1\" ";
        // line 11
        if (($context["S_MEDIA_EMBED_BBCODE"] ?? null)) {
            echo "checked=\"checked\"";
        }
        echo "/> ";
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("YES");
        echo "</label>
\t\t\t\t<label><input type=\"radio\" class=\"radio\" name=\"media_embed_bbcode\" value=\"0\" ";
        // line 12
        if ( !($context["S_MEDIA_EMBED_BBCODE"] ?? null)) {
            echo "checked=\"checked\"";
        }
        echo " /> ";
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("NO");
        echo "</label></dd>
\t\t</dl>
\t\t<dl>
\t\t\t<dt><label for=\"media_embed_allow_sig\">";
        // line 15
        echo ($this->env->getExtension('phpbb\template\twig\extension')->lang("ACP_MEDIA_ALLOW_SIG") . $this->env->getExtension('phpbb\template\twig\extension')->lang("COLON"));
        echo "</label><br /><span>";
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("ACP_MEDIA_ALLOW_SIG_EXPLAIN");
        echo "</span></dt>
\t\t\t<dd><label><input type=\"radio\" class=\"radio\" name=\"media_embed_allow_sig\" id=\"media_embed_allow_sig\" value=\"1\" ";
        // line 16
        if (($context["S_MEDIA_EMBED_ALLOW_SIG"] ?? null)) {
            echo "checked=\"checked\"";
        }
        echo "/> ";
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("YES");
        echo "</label>
\t\t\t\t<label><input type=\"radio\" class=\"radio\" name=\"media_embed_allow_sig\" value=\"0\" ";
        // line 17
        if ( !($context["S_MEDIA_EMBED_ALLOW_SIG"] ?? null)) {
            echo "checked=\"checked\"";
        }
        echo " /> ";
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("NO");
        echo "</label></dd>
\t\t</dl>
\t\t<dl>
\t\t\t<dt><label for=\"media_embed_parse_urls\">";
        // line 20
        echo ($this->env->getExtension('phpbb\template\twig\extension')->lang("ACP_MEDIA_PARSE_URLS") . $this->env->getExtension('phpbb\template\twig\extension')->lang("COLON"));
        echo "</label><br /><span>";
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("ACP_MEDIA_PARSE_URLS_EXPLAIN");
        echo "</span></dt>
\t\t\t<dd><label><input type=\"radio\" class=\"radio\" name=\"media_embed_parse_urls\" id=\"media_embed_parse_urls\" value=\"1\" ";
        // line 21
        if (($context["S_MEDIA_EMBED_PARSE_URLS"] ?? null)) {
            echo "checked=\"checked\"";
        }
        echo "/> ";
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("YES");
        echo "</label>
\t\t\t\t<label><input type=\"radio\" class=\"radio\" name=\"media_embed_parse_urls\" value=\"0\" ";
        // line 22
        if ( !($context["S_MEDIA_EMBED_PARSE_URLS"] ?? null)) {
            echo "checked=\"checked\"";
        }
        echo " /> ";
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("NO");
        echo "</label></dd>
\t\t</dl>
\t</fieldset>
\t<fieldset class=\"submit-buttons\">
\t\t<input class=\"button1\" type=\"submit\" id=\"submit\" name=\"submit\" value=\"";
        // line 26
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("SUBMIT");
        echo "\" />&nbsp;
\t\t<input class=\"button2\" type=\"reset\" id=\"reset\" name=\"reset\" value=\"";
        // line 27
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("RESET");
        echo "\" />
\t\t";
        // line 28
        echo ($context["S_FORM_TOKEN"] ?? null);
        echo "
\t</fieldset>
</form>

";
        // line 32
        $this->loadTemplate("overall_footer.html", "acp_phpbb_mediaembed_settings.html", 32)->display($context);
    }

    public function getTemplateName()
    {
        return "acp_phpbb_mediaembed_settings.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  128 => 32,  121 => 28,  117 => 27,  113 => 26,  102 => 22,  94 => 21,  88 => 20,  78 => 17,  70 => 16,  64 => 15,  54 => 12,  46 => 11,  40 => 10,  34 => 7,  29 => 5,  24 => 3,  21 => 2,  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "acp_phpbb_mediaembed_settings.html", "");
    }
}
