<?php

/* banhammer_body.html */
class __TwigTemplate_0da80b0f2394a87c6c48bd2b5be8d7ca691673f334d939fdeeaa953705a46c8b extends Twig_Template
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
        $location = "overall_header.html";
        $namespace = false;
        if (strpos($location, '@') === 0) {
            $namespace = substr($location, 1, strpos($location, '/') - 1);
            $previous_look_up_order = $this->env->getNamespaceLookUpOrder();
            $this->env->setNamespaceLookUpOrder(array($namespace, '__main__'));
        }
        $this->loadTemplate("overall_header.html", "banhammer_body.html", 1)->display($context);
        if ($namespace) {
            $this->env->setNamespaceLookUpOrder($previous_look_up_order);
        }
        // line 2
        echo "
<h1>";
        // line 3
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("ACP_BH_SETTINGS");
        echo "</h1>

";
        // line 5
        if (($context["S_SAVED"] ?? null)) {
            // line 6
            echo "\t<div class=\"successbox\">";
            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("SETTINGS_SAVED");
            echo "</div>
";
        }
        // line 8
        echo "
<form id=\"acp_board\" method=\"post\" action=\"";
        // line 9
        echo ($context["U_ACTION"] ?? null);
        echo "\">
\t<fieldset>
\t\t<dl>
\t\t\t<dt><label for=\"ban_email\">";
        // line 12
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("ACP_BAN_EMAIL");
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("COLON");
        echo "</label></dt>
\t\t\t<dd>
\t\t\t\t<label><input type=\"radio\" class=\"radio\" name=\"ban_email\" value=\"1\" ";
        // line 14
        if (($context["BAN_EMAIL"] ?? null)) {
            echo "id=\"ban_email\" checked=\"checked\"";
        }
        echo "/> ";
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("YES");
        echo "</label> &nbsp;
\t\t\t\t<label><input type=\"radio\" class=\"radio\" name=\"ban_email\" value=\"0\" ";
        // line 15
        if ( !($context["BAN_EMAIL"] ?? null)) {
            echo "id=\"ban_email\" checked=\"checked\"";
        }
        echo "/> ";
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("NO");
        echo "</label>
\t\t\t</dd>
\t\t</dl>
\t\t<dl>
\t\t\t<dt><label for=\"ban_ip\">";
        // line 19
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("ACP_BAN_IP");
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("COLON");
        echo "</label><br /><span>";
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("ACP_BAN_IP_EXPLAIN");
        echo "</span></dt>
\t\t\t<dd>
\t\t\t\t<label><input type=\"radio\" class=\"radio\" name=\"ban_ip\" value=\"1\" ";
        // line 21
        if (($context["BAN_IP"] ?? null)) {
            echo "id=\"ban_ip\" checked=\"checked\"";
        }
        echo "/> ";
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("YES");
        echo "</label> &nbsp;
\t\t\t\t<label><input type=\"radio\" class=\"radio\" name=\"ban_ip\" value=\"0\" ";
        // line 22
        if ( !($context["BAN_IP"] ?? null)) {
            echo "id=\"ban_ip\" checked=\"checked\"";
        }
        echo " />";
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("NO");
        echo "</label>
\t\t\t</dd>
\t\t</dl>
\t\t<dl>
\t\t\t<dt><label for=\"ban_time\">";
        // line 26
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("BAN_LENGTH");
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("COLON");
        echo "</label><br /><span>";
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("BAN_LENGTH_EXPLAIN");
        echo "</span></dt>
\t\t\t<dd><select name=\"ban_time\" id=\"ban_time\">";
        // line 27
        echo ($context["BAN_TIME"] ?? null);
        echo "</select></dd>
\t\t</dl>\t\t
\t\t<dl>
\t\t\t<dt><label for=\"del_posts\">";
        // line 30
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("ACP_DEL_POSTS");
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("COLON");
        echo "</label></dt>
\t\t\t<dd>
\t\t\t\t<label><input type=\"radio\" class=\"radio\" name=\"del_posts\" value=\"1\" ";
        // line 32
        if (($context["DEL_POSTS"] ?? null)) {
            echo "id=\"del_posts\" checked=\"checked\"";
        }
        echo "/> ";
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("YES");
        echo "</label> &nbsp;
\t\t\t\t<label><input type=\"radio\" class=\"radio\" name=\"del_posts\" value=\"0\" ";
        // line 33
        if ( !($context["DEL_POSTS"] ?? null)) {
            echo "id=\"del_posts\" checked=\"checked\"";
        }
        echo "/> ";
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("NO");
        echo "</label>
\t\t\t</dd>
\t\t</dl>
\t\t<dl>
\t\t\t<dt><label for=\"del_privmsgs\">";
        // line 37
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("ACP_DEL_PRIVMSGS");
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("COLON");
        echo "</label></dt>
\t\t\t<dd>
\t\t\t\t<label><input type=\"radio\" class=\"radio\" name=\"del_privmsgs\" value=\"1\" ";
        // line 39
        if (($context["DEL_PRIVMSGS"] ?? null)) {
            echo "id=\"del_privmsgs\" checked=\"checked\"";
        }
        echo "/> ";
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("YES");
        echo "</label> &nbsp;
\t\t\t\t<label><input type=\"radio\" class=\"radio\" name=\"del_privmsgs\" value=\"0\" ";
        // line 40
        if ( !($context["DEL_PRIVMSGS"] ?? null)) {
            echo "id=\"del_privmsgs\" checked=\"checked\"";
        }
        echo "/> ";
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("NO");
        echo "</label>
\t\t\t</dd>
\t\t</dl>
\t\t<dl>
\t\t\t<dt><label for=\"del_avatar\">";
        // line 44
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("ACP_DEL_AVATAR");
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("COLON");
        echo "</label></dt>
\t\t\t<dd>
\t\t\t\t<label><input type=\"radio\" class=\"radio\" name=\"del_avatar\" value=\"1\" ";
        // line 46
        if (($context["DEL_AVATAR"] ?? null)) {
            echo "id=\"del_avatar\" checked=\"checked\"";
        }
        echo "/> ";
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("YES");
        echo "</label> &nbsp;
\t\t\t\t<label><input type=\"radio\" class=\"radio\" name=\"del_avatar\" value=\"0\" ";
        // line 47
        if ( !($context["DEL_AVATAR"] ?? null)) {
            echo "id=\"del_avatar\" checked=\"checked\"";
        }
        echo "/> ";
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("NO");
        echo "</label>
\t\t\t</dd>
\t\t</dl>
\t\t<dl>
\t\t\t<dt><label for=\"del_signature\">";
        // line 51
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("ACP_DEL_SIGNATURE");
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("COLON");
        echo "</label></dt>
\t\t\t<dd>
\t\t\t\t<label><input type=\"radio\" class=\"radio\" name=\"del_signature\" value=\"1\" ";
        // line 53
        if (($context["DEL_SIGNATURE"] ?? null)) {
            echo "id=\"del_signature\" checked=\"checked\"";
        }
        echo "/> ";
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("YES");
        echo "</label> &nbsp;
\t\t\t\t<label><input type=\"radio\" class=\"radio\" name=\"del_signature\" value=\"0\" ";
        // line 54
        if ( !($context["DEL_SIGNATURE"] ?? null)) {
            echo "id=\"del_signature\" checked=\"checked\"";
        }
        echo "/> ";
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("NO");
        echo "</label>
\t\t\t</dd>
\t\t</dl>
\t\t<dl>
\t\t\t<dt><label for=\"del_profile\">";
        // line 58
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("ACP_DEL_PROFILE");
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("COLON");
        echo "</label></dt>
\t\t\t<dd>
\t\t\t\t<label><input type=\"radio\" class=\"radio\" name=\"del_profile\" value=\"1\" ";
        // line 60
        if (($context["DEL_PROFILE"] ?? null)) {
            echo "id=\"del_profile\" checked=\"checked\"";
        }
        echo "/> ";
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("YES");
        echo "</label> &nbsp;
\t\t\t\t<label><input type=\"radio\" class=\"radio\" name=\"del_profile\" value=\"0\" ";
        // line 61
        if ( !($context["DEL_PROFILE"] ?? null)) {
            echo "id=\"del_profile\" checked=\"checked\"";
        }
        echo "/> ";
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("NO");
        echo "</label>
\t\t\t</dd>
\t\t</dl>
\t\t<dl>
\t\t\t<dt><label for=\"move_group\">";
        // line 65
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("ACP_MOVE_GROUP");
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("COLON");
        echo "</label><br /><span>";
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("ACP_MOVE_GROUP_EXPLAIN");
        echo "</span></dt>
\t\t\t<dd><select id=\"move_group\" name=\"move_group\">";
        // line 66
        echo ($context["MOVE_GROUP"] ?? null);
        echo "</select></dd>
\t\t</dl>
\t\t<dl>
\t\t\t<dt><label for=\"sfs_api_key\">";
        // line 69
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("SFS_API_KEY");
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("COLON");
        echo "</label><br /><span>";
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("SFS_API_KEY_EXPLAIN");
        echo "</span></dt>
\t\t\t<dd>
\t\t\t\t";
        // line 71
        if ( !($context["SFS_CURL"] ?? null)) {
            // line 72
            echo "\t\t\t\t\t";
            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("SFS_NEEDS_CURL");
            echo "
\t\t\t\t";
        } else {
            // line 74
            echo "\t\t\t\t\t<input type=\"text\" class=\"input small\" name=\"sfs_api_key\" id=\"sfs_api_key\" value=\"";
            echo ($context["SFS_API_KEY"] ?? null);
            echo "\" />
\t\t\t\t";
        }
        // line 76
        echo "\t\t\t</dd>
\t\t</dl>

\t\t<p class=\"submit-buttons\">
\t\t\t<input class=\"button1\" type=\"submit\" id=\"submit\" name=\"submit\" value=\"";
        // line 80
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("SUBMIT");
        echo "\" />&nbsp;
\t\t\t<input class=\"button2\" type=\"reset\" id=\"reset\" name=\"reset\" value=\"";
        // line 81
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("RESET");
        echo "\" />
\t\t</p>

\t\t";
        // line 84
        echo ($context["S_FORM_TOKEN"] ?? null);
        echo "
\t</fieldset>
</form>

";
        // line 88
        $location = "overall_footer.html";
        $namespace = false;
        if (strpos($location, '@') === 0) {
            $namespace = substr($location, 1, strpos($location, '/') - 1);
            $previous_look_up_order = $this->env->getNamespaceLookUpOrder();
            $this->env->setNamespaceLookUpOrder(array($namespace, '__main__'));
        }
        $this->loadTemplate("overall_footer.html", "banhammer_body.html", 88)->display($context);
        if ($namespace) {
            $this->env->setNamespaceLookUpOrder($previous_look_up_order);
        }
    }

    public function getTemplateName()
    {
        return "banhammer_body.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  304 => 88,  297 => 84,  291 => 81,  287 => 80,  281 => 76,  275 => 74,  269 => 72,  267 => 71,  259 => 69,  253 => 66,  246 => 65,  235 => 61,  227 => 60,  221 => 58,  210 => 54,  202 => 53,  196 => 51,  185 => 47,  177 => 46,  171 => 44,  160 => 40,  152 => 39,  146 => 37,  135 => 33,  127 => 32,  121 => 30,  115 => 27,  108 => 26,  97 => 22,  89 => 21,  81 => 19,  70 => 15,  62 => 14,  56 => 12,  50 => 9,  47 => 8,  41 => 6,  39 => 5,  34 => 3,  31 => 2,  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "banhammer_body.html", "");
    }
}
