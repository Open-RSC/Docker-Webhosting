<?php

/* @phpbbmodders_banhammer/event/memberlist_view_content_prepend.html */
class __TwigTemplate_5548f11eee2dda5a497d5b56d6258c978a96c31f4fcb027cc85f932084191cd4 extends Twig_Template
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
        if (($context["BH_MESSAGE"] ?? null)) {
            // line 2
            echo "<div class=\"panel bg2\" style=\"background-color: ";
            echo ($context["BH_STYLE"] ?? null);
            echo ";\">
\t<div class=\"inner bh\">
\t\t<span>";
            // line 4
            echo ($context["BH_MESSAGE"] ?? null);
            echo "</span>
\t</div>
</div>

";
        } elseif (        // line 8
($context["S_SHOW_BH"] ?? null)) {
            // line 9
            echo "<div class=\"panel bg2\">
\t<p class=\"bh bh-click\">";
            // line 10
            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("BH_THIS_USER");
            echo "</p>
\t<div class=\"inner\" id=\"bh-options\" style=\"display: none;\">
\t\t<form id=\"bh-form\" method=\"post\" action=\"";
            // line 12
            echo ($context["U_HAMMERBAN"] ?? null);
            echo "\">
\t\t\t<fieldset>
\t\t\t\t<dl class=\"bg2 bh_hover\">
\t\t\t\t\t<dt><label>";
            // line 15
            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("BH_BAN_EMAIL");
            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("COLON");
            echo "</label></dt>
\t\t\t\t\t<dd>
\t\t\t\t\t\t<label><input type=\"radio\" class=\"radio\" name=\"ban_email\" value=\"1\" ";
            // line 17
            if (($context["BH_BAN_EMAIL"] ?? null)) {
                echo "checked=\"checked\"";
            }
            echo "/> ";
            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("YES");
            echo "</label> &nbsp;
\t\t\t\t\t\t<label><input type=\"radio\" class=\"radio\" name=\"ban_email\" value=\"0\" ";
            // line 18
            if ( !($context["BH_BAN_EMAIL"] ?? null)) {
                echo "checked=\"checked\"";
            }
            echo "/> ";
            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("NO");
            echo "</label>
\t\t\t\t\t</dd>
\t\t\t\t</dl>\t\t\t
\t\t\t\t<dl class=\"bg2 bh_hover\">
\t\t\t\t\t<dt><label>";
            // line 22
            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("BH_BAN_IP");
            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("COLON");
            echo "</label><br /><span>";
            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("BH_BAN_IP_EXPLAIN");
            echo "</span></dt>
\t\t\t\t\t<dd>
\t\t\t\t\t\t<label><input type=\"radio\" class=\"radio\" name=\"ban_ip\" value=\"1\" ";
            // line 24
            if (($context["BH_BAN_IP"] ?? null)) {
                echo "checked=\"checked\"";
            }
            echo "/> ";
            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("YES");
            echo "</label> &nbsp;
\t\t\t\t\t\t<label><input type=\"radio\" class=\"radio\" name=\"ban_ip\" value=\"0\" ";
            // line 25
            if ( !($context["BH_BAN_IP"] ?? null)) {
                echo "checked=\"checked\"";
            }
            echo "/> ";
            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("NO");
            echo "</label>
\t\t\t\t\t</dd>
\t\t\t\t</dl>
\t\t\t\t<dl class=\"bg2 bh_hover\">
\t\t\t\t\t<dt><label>";
            // line 29
            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("BAN_LENGTH");
            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("COLON");
            echo "</label><br /><span>";
            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("BAN_LENGTH_EXPLAIN");
            echo "</span></dt>
\t\t\t\t\t<dd>
\t\t\t\t\t\t<select name=\"ban_time\" id=\"ban_time\">";
            // line 31
            echo ($context["BAN_TIME"] ?? null);
            echo "</select>
\t\t\t\t\t</dd>
\t\t\t\t</dl>\t\t\t\t\t
\t\t\t\t<dl class=\"bg2 bh_hover\">
\t\t\t\t\t<dt><label>";
            // line 35
            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("BH_DEL_POSTS");
            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("COLON");
            echo "</label></dt>
\t\t\t\t\t<dd>
\t\t\t\t\t\t<label><input type=\"radio\" class=\"radio\" name=\"del_posts\" value=\"1\" ";
            // line 37
            if (($context["BH_DEL_POSTS"] ?? null)) {
                echo "checked=\"checked\"";
            }
            echo "/> ";
            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("YES");
            echo "</label> &nbsp;
\t\t\t\t\t\t<label><input type=\"radio\" class=\"radio\" name=\"del_posts\" value=\"0\" ";
            // line 38
            if ( !($context["BH_DEL_POSTS"] ?? null)) {
                echo "checked=\"checked\"";
            }
            echo "/> ";
            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("NO");
            echo "</label>
\t\t\t\t\t</dd>
\t\t\t\t</dl>
\t\t\t\t<dl class=\"bg2 bh_hover\">
\t\t\t\t\t<dt><label>";
            // line 42
            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("BH_DEL_PRIVMSGS");
            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("COLON");
            echo "</label></dt>
\t\t\t\t\t<dd>
\t\t\t\t\t\t<label><input type=\"radio\" class=\"radio\" name=\"del_privmsgs\" value=\"1\" ";
            // line 44
            if (($context["BH_DEL_PRIVMSGS"] ?? null)) {
                echo "checked=\"checked\"";
            }
            echo "/> ";
            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("YES");
            echo "</label> &nbsp;
\t\t\t\t\t\t<label><input type=\"radio\" class=\"radio\" name=\"del_privmsgs\" value=\"0\" ";
            // line 45
            if ( !($context["BH_DEL_PRIVMSGS"] ?? null)) {
                echo "checked=\"checked\"";
            }
            echo "/> ";
            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("NO");
            echo "</label>
\t\t\t\t\t</dd>
\t\t\t\t</dl>
\t\t\t\t<dl class=\"bg2 bh_hover\">
\t\t\t\t\t<dt><label>";
            // line 49
            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("BH_DEL_AVATAR");
            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("COLON");
            echo "</label></dt>
\t\t\t\t\t<dd>
\t\t\t\t\t\t<label><input type=\"radio\" class=\"radio\" name=\"del_avatar\" value=\"1\" ";
            // line 51
            if (($context["BH_DEL_AVATAR"] ?? null)) {
                echo "checked=\"checked\"";
            }
            echo "/> ";
            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("YES");
            echo "</label> &nbsp;
\t\t\t\t\t\t<label><input type=\"radio\" class=\"radio\" name=\"del_avatar\" value=\"0\" ";
            // line 52
            if ( !($context["BH_DEL_AVATAR"] ?? null)) {
                echo "checked=\"checked\"";
            }
            echo "/> ";
            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("NO");
            echo "</label>
\t\t\t\t\t</dd>
\t\t\t\t</dl>
\t\t\t\t<dl class=\"bg2 bh_hover\">
\t\t\t\t\t<dt><label>";
            // line 56
            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("BH_DEL_SIGNATURE");
            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("COLON");
            echo "</label></dt>
\t\t\t\t\t<dd>
\t\t\t\t\t\t<label><input type=\"radio\" class=\"radio\" name=\"del_signature\" value=\"1\" ";
            // line 58
            if (($context["BH_DEL_SIGNATURE"] ?? null)) {
                echo "checked=\"checked\"";
            }
            echo "/> ";
            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("YES");
            echo "</label> &nbsp;
\t\t\t\t\t\t<label><input type=\"radio\" class=\"radio\" name=\"del_signature\" value=\"0\" ";
            // line 59
            if ( !($context["BH_DEL_SIGNATURE"] ?? null)) {
                echo "checked=\"checked\"";
            }
            echo "/> ";
            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("NO");
            echo "</label>
\t\t\t\t\t</dd>
\t\t\t\t</dl>
\t\t\t\t<dl class=\"bg2 bh_hover\">
\t\t\t\t\t<dt><label>";
            // line 63
            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("BH_DEL_PROFILE");
            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("COLON");
            echo "</label></dt>
\t\t\t\t\t<dd>
\t\t\t\t\t\t<label><input type=\"radio\" class=\"radio\" name=\"del_profile\" value=\"1\" ";
            // line 65
            if (($context["BH_DEL_PROFILE"] ?? null)) {
                echo "checked=\"checked\"";
            }
            echo "/> ";
            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("YES");
            echo "</label> &nbsp;
\t\t\t\t\t\t<label><input type=\"radio\" class=\"radio\" name=\"del_profile\" value=\"0\" ";
            // line 66
            if ( !($context["BH_DEL_PROFILE"] ?? null)) {
                echo "checked=\"checked\"";
            }
            echo "/> ";
            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("NO");
            echo "</label>
\t\t\t\t\t</dd>
\t\t\t\t</dl>
\t\t\t\t";
            // line 69
            if (($context["L_BH_MOVE_GROUP"] ?? null)) {
                // line 70
                echo "\t\t\t\t<dl class=\"bg2 bh_hover\">
\t\t\t\t\t<dt><label>";
                // line 71
                echo $this->env->getExtension('phpbb\template\twig\extension')->lang("BH_MOVE_GROUP");
                echo $this->env->getExtension('phpbb\template\twig\extension')->lang("COLON");
                echo "</label></dt>
\t\t\t\t\t<dd>
\t\t\t\t\t\t<label><input type=\"radio\" class=\"radio\" name=\"move_group\" value=\"1\" checked=\"checked\" /> ";
                // line 73
                echo $this->env->getExtension('phpbb\template\twig\extension')->lang("YES");
                echo "</label> &nbsp;
\t\t\t\t\t\t<label><input type=\"radio\" class=\"radio\" name=\"move_group\" value=\"0\" /> ";
                // line 74
                echo $this->env->getExtension('phpbb\template\twig\extension')->lang("NO");
                echo "</label>
\t\t\t\t\t</dd>
\t\t\t\t</dl>
\t\t\t\t";
            }
            // line 78
            echo "\t\t\t\t";
            if (($context["S_BH_SFS"] ?? null)) {
                // line 79
                echo "\t\t\t\t<dl class=\"bg2 bh_hover\">
\t\t\t\t\t<dt><label>";
                // line 80
                echo $this->env->getExtension('phpbb\template\twig\extension')->lang("SFS_REPORT");
                echo $this->env->getExtension('phpbb\template\twig\extension')->lang("COLON");
                echo "</label></dt>
\t\t\t\t\t<dd>
\t\t\t\t\t\t<label><input type=\"radio\" class=\"radio\" name=\"sfs_report\" value=\"1\" checked=\"checked\" /> ";
                // line 82
                echo $this->env->getExtension('phpbb\template\twig\extension')->lang("YES");
                echo "</label> &nbsp;
\t\t\t\t\t\t<label><input type=\"radio\" class=\"radio\" name=\"sfs_report\" value=\"0\" /> ";
                // line 83
                echo $this->env->getExtension('phpbb\template\twig\extension')->lang("NO");
                echo "</label>
\t\t\t\t\t</dd>
\t\t\t\t</dl>
\t\t\t\t";
            }
            // line 87
            echo "\t\t\t\t<dl>
\t\t\t\t\t<dt><label>";
            // line 88
            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("BH_BAN_REASON");
            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("COLON");
            echo "</label></dt>
\t\t\t\t\t<dd><input name=\"bh_reason\" type=\"text\" class=\"text medium\" maxlength=\"255\" /></dd>
\t\t\t\t</dl>
\t\t\t\t<dl>
\t\t\t\t\t<dt><label>";
            // line 92
            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("BH_BAN_GIVE_REASON");
            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("COLON");
            echo "</label></dt>
\t\t\t\t\t<dd><input name=\"bh_reason_user\" type=\"text\" class=\"text medium\" maxlength=\"255\" /></dd>
\t\t\t\t</dl>
\t\t\t</fieldset>
\t\t\t<fieldset class=\"submit-buttons\">
\t\t\t\t<input class=\"button1\" type=\"submit\" id=\"submit\" name=\"submit\" value=\"";
            // line 97
            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("SUBMIT");
            echo "\" />&nbsp;
\t\t\t\t<input class=\"button2\" type=\"reset\" id=\"reset\" name=\"reset\" value=\"";
            // line 98
            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("RESET");
            echo "\" />
\t\t\t</fieldset>
\t\t</form>
\t</div>
</div>
";
        }
    }

    public function getTemplateName()
    {
        return "@phpbbmodders_banhammer/event/memberlist_view_content_prepend.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  310 => 98,  306 => 97,  297 => 92,  289 => 88,  286 => 87,  279 => 83,  275 => 82,  269 => 80,  266 => 79,  263 => 78,  256 => 74,  252 => 73,  246 => 71,  243 => 70,  241 => 69,  231 => 66,  223 => 65,  217 => 63,  206 => 59,  198 => 58,  192 => 56,  181 => 52,  173 => 51,  167 => 49,  156 => 45,  148 => 44,  142 => 42,  131 => 38,  123 => 37,  117 => 35,  110 => 31,  102 => 29,  91 => 25,  83 => 24,  75 => 22,  64 => 18,  56 => 17,  50 => 15,  44 => 12,  39 => 10,  36 => 9,  34 => 8,  27 => 4,  21 => 2,  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "@phpbbmodders_banhammer/event/memberlist_view_content_prepend.html", "");
    }
}
