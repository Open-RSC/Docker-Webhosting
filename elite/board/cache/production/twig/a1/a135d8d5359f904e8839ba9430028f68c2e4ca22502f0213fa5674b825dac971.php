<?php

/* index_body.html */
class __TwigTemplate_d4a07c39e62e254302a8b3f5919aeef125c65481b0e550ff78ec57701086c051 extends Twig_Template
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
        $this->loadTemplate("overall_header.html", "index_body.html", 1)->display($context);
        if ($namespace) {
            $this->env->setNamespaceLookUpOrder($previous_look_up_order);
        }
        // line 2
        echo "
<div class=\"fancy-index\"></div>

";
        // line 5
        // line 6
        echo "
";
        // line 7
        // line 8
        echo "
";
        // line 9
        $location = "forumlist_body.html";
        $namespace = false;
        if (strpos($location, '@') === 0) {
            $namespace = substr($location, 1, strpos($location, '/') - 1);
            $previous_look_up_order = $this->env->getNamespaceLookUpOrder();
            $this->env->setNamespaceLookUpOrder(array($namespace, '__main__'));
        }
        $this->loadTemplate("forumlist_body.html", "index_body.html", 9)->display($context);
        if ($namespace) {
            $this->env->setNamespaceLookUpOrder($previous_look_up_order);
        }
        // line 10
        echo "
";
        // line 11
        // line 12
        // line 13
        echo "
";
        // line 14
        if (($context["S_DISPLAY_ONLINE_LIST"] ?? null)) {
            // line 15
            echo "\t<div class=\"stat-block online-list\">
\t\t";
            // line 16
            if (($context["U_VIEWONLINE"] ?? null)) {
                echo "<h3><a href=\"";
                echo ($context["U_VIEWONLINE"] ?? null);
                echo "\">";
                echo $this->env->getExtension('phpbb\template\twig\extension')->lang("WHO_IS_ONLINE");
                echo "</a></h3>";
            } else {
                echo "<h3>";
                echo $this->env->getExtension('phpbb\template\twig\extension')->lang("WHO_IS_ONLINE");
                echo "</h3>";
            }
            // line 17
            echo "\t\t<p>
\t\t\t";
            // line 18
            // line 19
            echo "\t\t\t";
            echo ($context["TOTAL_USERS_ONLINE"] ?? null);
            echo " (";
            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("ONLINE_EXPLAIN");
            echo ")<br />";
            echo ($context["RECORD_USERS"] ?? null);
            echo "<br />
\t\t\t";
            // line 20
            if (($context["U_VIEWONLINE"] ?? null)) {
                // line 21
                echo "\t\t\t\t<br />";
                echo ($context["LOGGED_IN_USER_LIST"] ?? null);
                echo "
\t\t\t\t";
                // line 22
                if (($context["LEGEND"] ?? null)) {
                    echo "<br /><em>";
                    echo $this->env->getExtension('phpbb\template\twig\extension')->lang("LEGEND");
                    echo $this->env->getExtension('phpbb\template\twig\extension')->lang("COLON");
                    echo " ";
                    echo ($context["LEGEND"] ?? null);
                    echo "</em>";
                }
                // line 23
                echo "\t\t\t";
            }
            // line 24
            echo "\t\t\t";
            // line 25
            echo "\t\t\t";
            if (($context["U_VIEWONLINE"] ?? null)) {
                echo "<a class=\"online-pagelink\" href=\"";
                echo ($context["U_VIEWONLINE"] ?? null);
                echo "\" title=\"";
                echo $this->env->getExtension('phpbb\template\twig\extension')->lang("WHO_IS_ONLINE");
                echo "\">";
                echo ($context["LAST_POST_IMG"] ?? null);
                echo "</a>";
            }
            // line 26
            echo "\t\t</p>
\t</div>
";
        }
        // line 29
        // line 30
        if (($context["S_DISPLAY_BIRTHDAY_LIST"] ?? null)) {
            // line 31
            echo "\t<div class=\"stat-block birthday-list\">
\t\t<h3>";
            // line 32
            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("BIRTHDAYS");
            echo "</h3>
\t\t<p>
\t\t\t";
            // line 34
            // line 35
            echo "\t\t\t";
            if (twig_length_filter($this->env, $this->getAttribute(($context["loops"] ?? null), "birthdays", array()))) {
                echo $this->env->getExtension('phpbb\template\twig\extension')->lang("CONGRATULATIONS");
                echo $this->env->getExtension('phpbb\template\twig\extension')->lang("COLON");
                echo " <strong>";
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute(($context["loops"] ?? null), "birthdays", array()));
                foreach ($context['_seq'] as $context["_key"] => $context["birthdays"]) {
                    echo $this->getAttribute($context["birthdays"], "USERNAME", array());
                    if (($this->getAttribute($context["birthdays"], "AGE", array()) !== "")) {
                        echo " (";
                        echo $this->getAttribute($context["birthdays"], "AGE", array());
                        echo ")";
                    }
                    if ( !$this->getAttribute($context["birthdays"], "S_LAST_ROW", array())) {
                        echo ", ";
                    }
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['birthdays'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                echo "</strong>";
            } else {
                echo $this->env->getExtension('phpbb\template\twig\extension')->lang("NO_BIRTHDAYS");
            }
            // line 36
            echo "\t\t\t";
            // line 37
            echo "\t\t</p>
\t</div>
";
        }
        // line 40
        echo "
";
        // line 41
        if (($context["NEWEST_USER"] ?? null)) {
            // line 42
            echo "\t<div class=\"stat-block statistics\">
\t\t<h3>";
            // line 43
            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("STATISTICS");
            echo "</h3>
\t\t<p>
\t\t\t";
            // line 45
            // line 46
            echo "\t\t\t";
            echo ($context["TOTAL_POSTS"] ?? null);
            echo " &bull; ";
            echo ($context["TOTAL_TOPICS"] ?? null);
            echo " &bull; ";
            echo ($context["TOTAL_USERS"] ?? null);
            echo " &bull; ";
            echo ($context["NEWEST_USER"] ?? null);
            echo "
\t\t\t";
            // line 47
            // line 48
            echo "\t\t</p>
\t</div>
";
        }
        // line 51
        echo "
";
        // line 52
        $previous_look_up_order = $this->env->getNamespaceLookUpOrder();
        $this->env->setNamespaceLookUpOrder(array('rmcgirr83_activity24hours', '__main__'));
        $this->env->loadTemplate('@rmcgirr83_activity24hours/event/index_body_stat_blocks_after.html')->display($context);
        $this->env->setNamespaceLookUpOrder($previous_look_up_order);
        // line 53
        echo "
";
        // line 54
        if (($context["RECENT_TOPICS_DISPLAY"] ?? null)) {
            // line 55
            if (((($context["ADS_INDEX_CODE"] ?? null) &&  !($context["S_IS_BOT"] ?? null)) && ($this->getAttribute(($context["definition"] ?? null), "ADSIDE", array()) == false))) {
                // line 56
                echo "<div class=\"misc-block advertisement\">";
                echo ($context["ADS_INDEX_CODE"] ?? null);
                echo "</div>
";
            }
        }
        // line 59
        echo "
<div class=\"clear\"></div>

";
        // line 62
        $location = "overall_footer.html";
        $namespace = false;
        if (strpos($location, '@') === 0) {
            $namespace = substr($location, 1, strpos($location, '/') - 1);
            $previous_look_up_order = $this->env->getNamespaceLookUpOrder();
            $this->env->setNamespaceLookUpOrder(array($namespace, '__main__'));
        }
        $this->loadTemplate("overall_footer.html", "index_body.html", 62)->display($context);
        if ($namespace) {
            $this->env->setNamespaceLookUpOrder($previous_look_up_order);
        }
    }

    public function getTemplateName()
    {
        return "index_body.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  234 => 62,  229 => 59,  222 => 56,  220 => 55,  218 => 54,  215 => 53,  210 => 52,  207 => 51,  202 => 48,  201 => 47,  190 => 46,  189 => 45,  184 => 43,  181 => 42,  179 => 41,  176 => 40,  171 => 37,  169 => 36,  143 => 35,  142 => 34,  137 => 32,  134 => 31,  132 => 30,  131 => 29,  126 => 26,  115 => 25,  113 => 24,  110 => 23,  101 => 22,  96 => 21,  94 => 20,  85 => 19,  84 => 18,  81 => 17,  69 => 16,  66 => 15,  64 => 14,  61 => 13,  60 => 12,  59 => 11,  56 => 10,  44 => 9,  41 => 8,  40 => 7,  37 => 6,  36 => 5,  31 => 2,  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "index_body.html", "");
    }
}
