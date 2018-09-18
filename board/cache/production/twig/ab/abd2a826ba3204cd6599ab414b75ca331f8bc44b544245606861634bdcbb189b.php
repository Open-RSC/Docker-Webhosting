<?php

/* feed.xml.twig */
class __TwigTemplate_14b84e99b4a83ae03e411f0b72e1d68dde31c5c8e22b2d808c681c416dc95d38 extends Twig_Template
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
        echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>
<feed xmlns=\"http://www.w3.org/2005/Atom\" xml:lang=\"";
        // line 2
        echo ($context["FEED_LANG"] ?? null);
        echo "\">
\t<link rel=\"self\" type=\"application/atom+xml\" href=\"";
        // line 3
        echo ($context["SELF_LINK"] ?? null);
        echo "\" />

\t";
        // line 5
        if ( !twig_test_empty(($context["FEED_TITLE"] ?? null))) {
            echo "<title>";
            echo ($context["FEED_TITLE"] ?? null);
            echo "</title>";
        }
        // line 6
        echo "
\t";
        // line 7
        if ( !twig_test_empty(($context["FEED_SUBTITLE"] ?? null))) {
            echo "<subtitle>";
            echo ($context["FEED_SUBTITLE"] ?? null);
            echo "</subtitle>";
        }
        // line 8
        echo "
\t";
        // line 9
        if ( !twig_test_empty(($context["FEED_LINK"] ?? null))) {
            echo "<link href=\"";
            echo ($context["FEED_LINK"] ?? null);
            echo "\" />";
        }
        // line 10
        echo "
\t<updated>";
        // line 11
        echo ($context["FEED_UPDATED"] ?? null);
        echo "</updated>

\t<author><name><![CDATA[";
        // line 13
        echo ($context["FEED_AUTHOR"] ?? null);
        echo "]]></name></author>
\t<id>";
        // line 14
        echo ($context["SELF_LINK"] ?? null);
        echo "</id>

\t";
        // line 16
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["FEED_ROWS"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["row"]) {
            // line 17
            echo "\t<entry>
\t\t";
            // line 18
            if ( !twig_test_empty($this->getAttribute($context["row"], "author", array()))) {
                echo "<author><name><![CDATA[";
                echo $this->getAttribute($context["row"], "author", array());
                echo "]]></name></author>";
            }
            // line 19
            echo "
\t\t<updated>";
            // line 20
            if ( !twig_test_empty($this->getAttribute($context["row"], "updated", array()))) {
                echo $this->getAttribute($context["row"], "updated", array());
                echo " ";
            } else {
                echo $this->getAttribute($context["row"], "published", array());
            }
            echo "</updated>

\t\t";
            // line 22
            if ( !twig_test_empty($this->getAttribute($context["row"], "published", array()))) {
                echo "<published>";
                echo $this->getAttribute($context["row"], "published", array());
                echo "</published>";
            }
            // line 23
            echo "
\t\t<id>";
            // line 24
            echo $this->getAttribute($context["row"], "link", array());
            echo "</id>
\t\t<link href=\"";
            // line 25
            echo $this->getAttribute($context["row"], "link", array());
            echo "\"/>
\t\t<title type=\"html\"><![CDATA[";
            // line 26
            echo $this->getAttribute($context["row"], "title", array());
            echo "]]></title>

\t\t";
            // line 28
            if ((( !twig_test_empty($this->getAttribute($context["row"], "category", array())) && $this->getAttribute($context["row"], "category_name", array(), "any", true, true)) && ($this->getAttribute($context["row"], "category_name", array()) != ""))) {
                // line 29
                echo "\t\t\t<category term=\"";
                echo $this->getAttribute($context["row"], "category_name", array());
                echo "\" scheme=\"";
                echo $this->getAttribute($context["row"], "category", array());
                echo "\" label=\"";
                echo $this->getAttribute($context["row"], "category_name", array());
                echo "\"/>
\t\t";
            }
            // line 31
            echo "
\t\t<content type=\"html\" xml:base=\"";
            // line 32
            echo $this->getAttribute($context["row"], "link", array());
            echo "\"><![CDATA[
";
            // line 33
            echo $this->getAttribute($context["row"], "description", array());
            if ( !twig_test_empty($this->getAttribute($context["row"], "statistics", array()))) {
                echo "<p>";
                echo $this->env->getExtension('phpbb\template\twig\extension')->lang("STATISTICS");
                echo ": ";
                echo $this->getAttribute($context["row"], "statistics", array());
                echo "</p>";
            }
            echo "<hr />
]]></content>
\t</entry>
\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['row'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 37
        echo "</feed>
";
    }

    public function getTemplateName()
    {
        return "feed.xml.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  156 => 37,  139 => 33,  135 => 32,  132 => 31,  122 => 29,  120 => 28,  115 => 26,  111 => 25,  107 => 24,  104 => 23,  98 => 22,  88 => 20,  85 => 19,  79 => 18,  76 => 17,  72 => 16,  67 => 14,  63 => 13,  58 => 11,  55 => 10,  49 => 9,  46 => 8,  40 => 7,  37 => 6,  31 => 5,  26 => 3,  22 => 2,  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "feed.xml.twig", "");
    }
}
