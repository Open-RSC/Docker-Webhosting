<?php

/* @rmcgirr83_activity24hours/event/index_body_stat_blocks_after.html */
class __TwigTemplate_bb39a1438084661c73a8f7e578999a7204b2d8a9a32600addf1835a12f271041 extends Twig_Template
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
        if (($context["S_CAN_VIEW_24_HOURS"] ?? null)) {
            // line 2
            echo "<div class=\"stat-block 24stats\">
\t\t<h3 id=\"twentyfourhour_stats\">";
            // line 3
            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("TWENTYFOURHOUR_STATS");
            echo "</h3>

\t\t<p>";
            // line 5
            echo ($context["HOUR_POSTS"] ?? null);
            echo " &bull; ";
            echo ($context["HOUR_TOPICS"] ?? null);
            echo " &bull; ";
            echo ($context["HOUR_USERS"] ?? null);
            echo "
\t\t<br>";
            // line 6
            echo ($context["TOTAL_24HOUR_USERS"] ?? null);
            echo " ";
            echo ($context["USERS_24HOUR_TOTAL"] ?? null);
            echo " ";
            echo ($context["HIDDEN_24HOUR_TOTAL"] ?? null);
            echo " ";
            echo ($context["BOTS_24HOUR_TOTAL"] ?? null);
            echo " ";
            echo ($context["GUEST_ONLINE_24"] ?? null);
            echo " ";
            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("LAST_24_HOURS");
            if (($context["USERS_ACTIVE"] ?? null)) {
                echo "<br>";
                echo $this->env->getExtension('phpbb\template\twig\extension')->lang("REGISTERED_USERS");
                echo " ";
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute(($context["loops"] ?? null), "lastvisit", array()));
                foreach ($context['_seq'] as $context["_key"] => $context["lastvisit"]) {
                    echo " ";
                    echo $this->getAttribute($context["lastvisit"], "USERNAME_FULL", array());
                    if ( !$this->getAttribute($context["lastvisit"], "S_LAST_ROW", array())) {
                        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("COMMA_SEPARATOR");
                        echo " ";
                    }
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['lastvisit'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
            }
            // line 7
            echo "\t\t<br>";
            if (($context["BOTS_ACTIVE"] ?? null)) {
                echo $this->env->getExtension('phpbb\template\twig\extension')->lang("G_BOTS");
                echo $this->env->getExtension('phpbb\template\twig\extension')->lang("COLON");
                echo " ";
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute(($context["loops"] ?? null), "bot_lastvisit", array()));
                foreach ($context['_seq'] as $context["_key"] => $context["bot_lastvisit"]) {
                    echo " ";
                    echo $this->getAttribute($context["bot_lastvisit"], "BOTNAME_FULL", array());
                    if ( !$this->getAttribute($context["bot_lastvisit"], "S_LAST_ROW", array())) {
                        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("COMMA_SEPARATOR");
                        echo " ";
                    }
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['bot_lastvisit'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
            }
            // line 8
            echo "\t\t</p>
</div>
";
        }
    }

    public function getTemplateName()
    {
        return "@rmcgirr83_activity24hours/event/index_body_stat_blocks_after.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  87 => 8,  67 => 7,  37 => 6,  29 => 5,  24 => 3,  21 => 2,  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "@rmcgirr83_activity24hours/event/index_body_stat_blocks_after.html", "");
    }
}
