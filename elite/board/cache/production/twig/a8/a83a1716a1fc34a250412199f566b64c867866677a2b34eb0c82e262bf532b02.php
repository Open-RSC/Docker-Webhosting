<?php

/* navbar.html */
class __TwigTemplate_9fcf1081451f6cc403a3d7419f60c9f740d1c0fa032f406e7db3d0fac4e85d22 extends Twig_Template
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
        echo "<div class=\"navbar\"";
        if (( !($context["S_DISPLAY_SEARCH"] ?? null) || ($context["S_IN_SEARCH"] ?? null))) {
            echo " class=\"no-search\"";
        }
        echo ">
\t<ul id=\"nav-breadcrumbs\" class=\"nav-breadcrumbs linklist navlinks\" role=\"menubar\">
\t\t";
        // line 3
        $value = " itemtype=\"http://data-vocabulary.org/Breadcrumb\" itemscope=\"\"";
        $context['definition']->set('MICRODATA', $value);
        // line 4
        echo "\t\t";
        // line 5
        echo "\t\t<li class=\"breadcrumbs\">
\t\t\t";
        // line 6
        if (($context["U_SITE_HOME"] ?? null)) {
            // line 7
            echo "\t\t\t<span class=\"crumb\" ";
            echo $this->getAttribute(($context["definition"] ?? null), "MICRODATA", array());
            echo "><a href=\"";
            echo ($context["U_SITE_HOME"] ?? null);
            echo "\" itemprop=\"url\" data-navbar-reference=\"home\"><i class=\"icon fa-home fa-fw\" aria-hidden=\"true\"></i><span itemprop=\"title\">";
            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("SITE_HOME");
            echo "</span></a></span>
\t\t\t";
        }
        // line 9
        echo "\t\t\t";
        // line 10
        echo "\t\t\t<span class=\"crumb\" ";
        echo $this->getAttribute(($context["definition"] ?? null), "MICRODATA", array());
        echo "><a href=\"";
        echo ($context["U_INDEX"] ?? null);
        echo "\" itemprop=\"url\" accesskey=\"h\" data-navbar-reference=\"index\">";
        if ( !($context["U_SITE_HOME"] ?? null)) {
            echo "<i class=\"icon fa-home fa-fw\"></i>";
        }
        echo "<span itemprop=\"title\">";
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("INDEX");
        echo "</span></a></span>

\t\t\t";
        // line 12
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute(($context["loops"] ?? null), "navlinks", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["navlinks"]) {
            // line 13
            echo "\t\t\t";
            // line 14
            echo "\t\t\t<span class=\"crumb\" ";
            echo $this->getAttribute(($context["definition"] ?? null), "MICRODATA", array());
            if ($this->getAttribute($context["navlinks"], "MICRODATA", array())) {
                echo " ";
                echo $this->getAttribute($context["navlinks"], "MICRODATA", array());
            }
            echo "><a href=\"";
            echo $this->getAttribute($context["navlinks"], "U_VIEW_FORUM", array());
            echo "\" itemprop=\"url\"><span itemprop=\"title\">";
            echo $this->getAttribute($context["navlinks"], "FORUM_NAME", array());
            echo "</span></a></span>
\t\t\t";
            // line 15
            // line 16
            echo "\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['navlinks'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 17
        echo "\t\t\t";
        if (($context["S_VIEWTOPIC"] ?? null)) {
            echo "<span class=\"crumb crumb-topic\"><a href=\"";
            echo ($context["U_VIEW_TOPIC"] ?? null);
            echo "\">";
            echo ($context["TOPIC_TITLE"] ?? null);
            echo "</a></span>";
        }
        // line 18
        echo "\t\t\t";
        // line 19
        echo "\t\t</li>
\t\t";
        // line 20
        // line 21
        echo "\t\t";
        if ((($context["S_DISPLAY_SEARCH"] ?? null) &&  !($context["S_IN_SEARCH"] ?? null))) {
            // line 22
            echo "\t\t<li class=\"rightside responsive-search\">
\t\t\t<a href=\"";
            // line 23
            echo ($context["U_SEARCH"] ?? null);
            echo "\" title=\"";
            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("SEARCH_ADV_EXPLAIN");
            echo "\" role=\"menuitem\">
\t\t\t\t<i class=\"icon fa-search fa-fw\" aria-hidden=\"true\"></i><span class=\"sr-only\">";
            // line 24
            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("SEARCH");
            echo "</span>
\t\t\t</a>
\t\t</li>
\t\t";
        }
        // line 28
        echo "
\t\t";
        // line 29
        if ( !($context["S_IS_BOT"] ?? null)) {
            // line 30
            echo "\t\t\t";
            if (($context["U_SITE_HOME"] ?? null)) {
                // line 31
                echo "\t\t\t\t";
                if ((($context["S_USER_LOGGED_IN"] ?? null) && ($context["U_MARK_FORUMS"] ?? null))) {
                    echo "<li class=\"rightside small-icon icon-mark-read\"><a href=\"";
                    echo ($context["U_MARK_FORUMS"] ?? null);
                    echo "\" accesskey=\"m\" data-ajax=\"mark_forums_read\" title=\"";
                    echo $this->env->getExtension('phpbb\template\twig\extension')->lang("MARK_FORUMS_READ");
                    echo "\"></a></li>";
                }
                // line 32
                echo "\t\t\t";
            } elseif (($context["S_INDEX"] ?? null)) {
                // line 33
                echo "\t\t\t\t";
                if ((($context["S_USER_LOGGED_IN"] ?? null) && ($context["U_MARK_FORUMS"] ?? null))) {
                    echo "<li class=\"rightside small-icon icon-mark-read\"><a href=\"";
                    echo ($context["U_MARK_FORUMS"] ?? null);
                    echo "\" accesskey=\"m\" data-ajax=\"mark_forums_read\" title=\"";
                    echo $this->env->getExtension('phpbb\template\twig\extension')->lang("MARK_FORUMS_READ");
                    echo "\"></a></li>";
                }
                // line 34
                echo "\t\t\t";
            } elseif (($context["S_VIEWFORUM"] ?? null)) {
                // line 35
                echo "\t\t\t\t";
                if ((($context["S_HAS_SUBFORUM"] ?? null) && ($context["U_MARK_FORUMS"] ?? null))) {
                    echo "<li class=\"rightside small-icon icon-mark-read\"><a href=\"";
                    echo ($context["U_MARK_FORUMS"] ?? null);
                    echo "\" data-ajax=\"mark_forums_read\" title=\"";
                    echo $this->env->getExtension('phpbb\template\twig\extension')->lang("MARK_SUBFORUMS_READ");
                    echo "\"></a></li>";
                }
                // line 36
                echo "\t\t\t";
            } elseif (($context["S_VIEWTOPIC"] ?? null)) {
                // line 37
                echo "\t\t\t\t";
                if (($context["U_VIEW_UNREAD_POST"] ?? null)) {
                    echo "<li class=\"rightside small-icon icon-view\"><a href=\"";
                    echo ($context["U_VIEW_UNREAD_POST"] ?? null);
                    echo "\" title=\"";
                    echo $this->env->getExtension('phpbb\template\twig\extension')->lang("VIEW_UNREAD_POST");
                    echo "\"></a></li>";
                }
                // line 38
                echo "\t\t\t";
            } elseif ((($context["SEARCH_MATCHES"] ?? null) &&  !($context["S_IN_SEARCH"] ?? null))) {
                // line 39
                echo "\t\t\t\t";
                if (($context["SEARCH_TOPIC"] ?? null)) {
                    // line 40
                    echo "\t\t\t\t\t<li class=\"rightside\"><a class=\"arrow-";
                    echo ($context["S_CONTENT_FLOW_BEGIN"] ?? null);
                    echo "\" href=\"";
                    echo ($context["U_SEARCH_TOPIC"] ?? null);
                    echo "\">";
                    echo $this->env->getExtension('phpbb\template\twig\extension')->lang("RETURN_TO_TOPIC");
                    echo "</a></li>
\t\t\t\t";
                } else {
                    // line 42
                    echo "\t\t\t\t\t<li class=\"rightside\"><a class=\"arrow-";
                    echo ($context["S_CONTENT_FLOW_BEGIN"] ?? null);
                    echo "\" href=\"";
                    echo ($context["U_SEARCH"] ?? null);
                    echo "\" title=\"";
                    echo $this->env->getExtension('phpbb\template\twig\extension')->lang("SEARCH_ADV");
                    echo "\">";
                    echo $this->env->getExtension('phpbb\template\twig\extension')->lang("GO_TO_SEARCH_ADV");
                    echo "</a></li>
\t\t\t\t";
                }
                // line 44
                echo "\t\t\t";
            }
            // line 45
            echo "\t\t";
        }
        // line 46
        echo "
\t</ul>
</div>";
    }

    public function getTemplateName()
    {
        return "navbar.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  210 => 46,  207 => 45,  204 => 44,  192 => 42,  182 => 40,  179 => 39,  176 => 38,  167 => 37,  164 => 36,  155 => 35,  152 => 34,  143 => 33,  140 => 32,  131 => 31,  128 => 30,  126 => 29,  123 => 28,  116 => 24,  110 => 23,  107 => 22,  104 => 21,  103 => 20,  100 => 19,  98 => 18,  89 => 17,  83 => 16,  82 => 15,  69 => 14,  67 => 13,  63 => 12,  49 => 10,  47 => 9,  37 => 7,  35 => 6,  32 => 5,  30 => 4,  27 => 3,  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "navbar.html", "");
    }
}
