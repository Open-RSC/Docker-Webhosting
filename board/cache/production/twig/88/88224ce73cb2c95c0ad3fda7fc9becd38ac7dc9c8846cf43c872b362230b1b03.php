<?php

/* ucp_profile_autologin_keys.html */
class __TwigTemplate_b37edcb28e506290a943a4f1bf7f7b7b54656c143e2c383aaa6b231a7005c1f4 extends Twig_Template
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
        $location = "ucp_header.html";
        $namespace = false;
        if (strpos($location, '@') === 0) {
            $namespace = substr($location, 1, strpos($location, '/') - 1);
            $previous_look_up_order = $this->env->getNamespaceLookUpOrder();
            $this->env->setNamespaceLookUpOrder(array($namespace, '__main__'));
        }
        $this->loadTemplate("ucp_header.html", "ucp_profile_autologin_keys.html", 1)->display($context);
        if ($namespace) {
            $this->env->setNamespaceLookUpOrder($previous_look_up_order);
        }
        // line 2
        echo "
<form id=\"ucp\" method=\"post\" action=\"";
        // line 3
        echo ($context["S_UCP_ACTION"] ?? null);
        echo "\"";
        echo ($context["S_FORM_ENCTYPE"] ?? null);
        echo ">

<h2>";
        // line 5
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("TITLE");
        echo "</h2>
<div class=\"panel\">
\t<div class=\"inner\">
\t\t<p>";
        // line 8
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("PROFILE_AUTOLOGIN_KEYS");
        echo "</p>
\t\t";
        // line 9
        if (($context["ERROR"] ?? null)) {
            echo "<p class=\"error\">";
            echo ($context["ERROR"] ?? null);
            echo "</p>";
        }
        // line 10
        echo "\t\t<table class=\"table1\">
\t\t\t<thead>
\t\t\t\t<tr>
\t\t\t\t\t<th class=\"name\">";
        // line 13
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("LOGIN_KEY");
        echo "</th>
\t\t\t\t\t<th class=\"center\">";
        // line 14
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("IP");
        echo "</th>
\t\t\t\t\t<th class=\"center\">";
        // line 15
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("LOGIN_TIME");
        echo "</th>
\t\t\t\t\t<th class=\"center mark\">";
        // line 16
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("MARK");
        echo "</th>
\t\t\t\t</tr>
\t\t\t</thead>
\t\t\t<tbody>
\t\t\t";
        // line 20
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute(($context["loops"] ?? null), "sessions", array()));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["sessions"]) {
            // line 21
            echo "\t\t\t\t";
            if (($this->getAttribute($context["sessions"], "S_ROW_COUNT", array()) % 2 == 0)) {
                echo "<tr class=\"bg1\">";
            } else {
                echo "<tr class=\"bg2\">";
            }
            // line 22
            echo "\t\t\t\t\t<td><label for=\"";
            echo $this->getAttribute($context["sessions"], "KEY", array());
            echo "\">";
            echo $this->getAttribute($context["sessions"], "KEY", array());
            echo "</label></td>
\t\t\t\t\t<td class=\"center\">";
            // line 23
            echo $this->getAttribute($context["sessions"], "IP", array());
            echo "</td>
\t\t\t\t\t<td class=\"center\">";
            // line 24
            echo $this->getAttribute($context["sessions"], "LOGIN_TIME", array());
            echo "</td>
\t\t\t\t\t<td class=\"center mark\"><input type=\"checkbox\" name=\"keys[]\" value=\"";
            // line 25
            echo $this->getAttribute($context["sessions"], "KEY", array());
            echo "\" id=\"";
            echo $this->getAttribute($context["sessions"], "KEY", array());
            echo "\" /></td>
\t\t\t\t</tr>
\t\t\t";
            $context['_iterated'] = true;
        }
        if (!$context['_iterated']) {
            // line 28
            echo "\t\t\t\t<tr><td colspan=\"4\" class=\"bg1\" style=\"text-align: center\">";
            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("PROFILE_NO_AUTOLOGIN_KEYS");
            echo "</td></tr>
\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['sessions'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 30
        echo "\t\t\t</tbody>
\t\t</table>
\t</div>
</div>

";
        // line 35
        if (twig_length_filter($this->env, $this->getAttribute(($context["loops"] ?? null), "sessions", array()))) {
            // line 36
            echo "\t<fieldset class=\"display-actions\">
\t\t";
            // line 37
            echo ($context["S_HIDDEN_FIELDS"] ?? null);
            echo "<input type=\"submit\" name=\"submit\" value=\"";
            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("DELETE_MARKED");
            echo "\" class=\"button2\" />
\t\t<div><a href=\"#\" onclick=\"\$('#ucp input:checkbox').prop('checked', true); return false;\">";
            // line 38
            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("MARK_ALL");
            echo "</a> &bull; <a href=\"#\" onclick=\"\$('#ucp input:checkbox').prop('checked', false); return false;\">";
            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("UNMARK_ALL");
            echo "</a></div>
\t\t";
            // line 39
            echo ($context["S_FORM_TOKEN"] ?? null);
            echo "
\t</fieldset>
";
        }
        // line 42
        echo "
</form>

";
        // line 45
        $location = "ucp_footer.html";
        $namespace = false;
        if (strpos($location, '@') === 0) {
            $namespace = substr($location, 1, strpos($location, '/') - 1);
            $previous_look_up_order = $this->env->getNamespaceLookUpOrder();
            $this->env->setNamespaceLookUpOrder(array($namespace, '__main__'));
        }
        $this->loadTemplate("ucp_footer.html", "ucp_profile_autologin_keys.html", 45)->display($context);
        if ($namespace) {
            $this->env->setNamespaceLookUpOrder($previous_look_up_order);
        }
    }

    public function getTemplateName()
    {
        return "ucp_profile_autologin_keys.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  162 => 45,  157 => 42,  151 => 39,  145 => 38,  139 => 37,  136 => 36,  134 => 35,  127 => 30,  118 => 28,  108 => 25,  104 => 24,  100 => 23,  93 => 22,  86 => 21,  81 => 20,  74 => 16,  70 => 15,  66 => 14,  62 => 13,  57 => 10,  51 => 9,  47 => 8,  41 => 5,  34 => 3,  31 => 2,  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "ucp_profile_autologin_keys.html", "");
    }
}
