<?php

/* @senky_userrecentactivity/event/memberlist_view_content_append.html */
class __TwigTemplate_c66310f3bd4e9451bdbc5399b54671e00005062473d6feab5eed25654287cc16 extends Twig_Template
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
        if (twig_length_filter($this->env, $this->getAttribute(($context["loops"] ?? null), "post", array()))) {
            // line 2
            echo "\t<div class=\"forumbg\">
\t\t<div class=\"inner\">
\t\t\t<ul class=\"topiclist\">
\t\t\t\t<li class=\"header\">
\t\t\t\t\t<dl>
\t\t\t\t\t\t<dt>";
            // line 7
            echo ($context["USER_RECENT_ACTIVITY"] ?? null);
            echo "</dt>
\t\t\t\t\t\t<dd class=\"posts\">";
            // line 8
            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("REPLIES");
            echo "</dd>
\t\t\t\t\t\t<dd class=\"views\">";
            // line 9
            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("VIEWS");
            echo "</dd>
\t\t\t\t\t\t<dd class=\"lastpost\"><span>";
            // line 10
            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("DATE");
            echo "</span></dd>
\t\t\t\t\t</dl>
\t\t\t\t</li>
\t\t\t</ul>
\t\t\t";
            // line 14
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute(($context["loops"] ?? null), "post", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["post"]) {
                // line 15
                echo "\t\t\t\t<ul class=\"topiclist\">
\t\t\t\t\t<li class=\"row";
                // line 16
                if (($this->getAttribute($context["post"], "S_ROW_COUNT", array()) % 2 == 0)) {
                    echo " bg1";
                } else {
                    echo " bg2";
                }
                echo "\">
\t\t\t\t\t\t<dl>
\t\t\t\t\t\t\t<dt>
\t\t\t\t\t\t\t\t<div class=\"list-inner\">
\t\t\t\t\t\t\t\t\t<a class=\"topictitle\" href=\"";
                // line 20
                echo $this->getAttribute($context["post"], "U_POSTS", array());
                echo "\">";
                echo $this->getAttribute($context["post"], "SUBJECT", array());
                echo "</a>
\t\t\t\t\t\t\t\t\t";
                // line 21
                if ($this->getAttribute($context["post"], "POST_TEXT", array())) {
                    // line 22
                    echo "\t\t\t\t\t\t\t\t\t\t<br>
\t\t\t\t\t\t\t\t\t\t<em>";
                    // line 23
                    echo $this->getAttribute($context["post"], "POST_TEXT", array());
                    echo "</em>
\t\t\t\t\t\t\t\t\t";
                }
                // line 25
                echo "\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</dt>
\t\t\t\t\t\t\t<dd class=\"posts\">";
                // line 27
                echo $this->getAttribute($context["post"], "REPLIES", array());
                echo " <dfn>";
                echo $this->env->getExtension('phpbb\template\twig\extension')->lang("REPLIES");
                echo "</dfn></dd>
\t\t\t\t\t\t\t<dd class=\"views\">";
                // line 28
                echo $this->getAttribute($context["post"], "VIEWS", array());
                echo " <dfn>";
                echo $this->env->getExtension('phpbb\template\twig\extension')->lang("VIEWS");
                echo "</dfn></dd>
\t\t\t\t\t\t\t<dd class=\"lastpost\"><span><dfn>";
                // line 29
                echo $this->env->getExtension('phpbb\template\twig\extension')->lang("LAST_POST");
                echo "</dfn>
\t\t\t\t\t\t\t\t";
                // line 30
                echo $this->getAttribute($context["post"], "TIME", array());
                echo " <a href=\"";
                echo $this->getAttribute($context["post"], "U_POSTS", array());
                echo "\">";
                echo ($context["LAST_POST_IMG"] ?? null);
                echo "</a></span>
\t\t\t\t\t\t\t</dd>
\t\t\t\t\t\t</dl>
\t\t\t\t\t</li>
\t\t\t\t</ul>
\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['post'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 36
            echo "\t\t</div>
\t</div>
";
        }
    }

    public function getTemplateName()
    {
        return "@senky_userrecentactivity/event/memberlist_view_content_append.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  117 => 36,  101 => 30,  97 => 29,  91 => 28,  85 => 27,  81 => 25,  76 => 23,  73 => 22,  71 => 21,  65 => 20,  54 => 16,  51 => 15,  47 => 14,  40 => 10,  36 => 9,  32 => 8,  28 => 7,  21 => 2,  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "@senky_userrecentactivity/event/memberlist_view_content_append.html", "");
    }
}
