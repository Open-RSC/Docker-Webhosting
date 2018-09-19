<?php

/* forumlist_body.html */
class __TwigTemplate_8cf3b80574df291fe1f8ad1dda4d61cf22dec27888d1bbe4a12e654085998d5d extends Twig_Template
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
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute(($context["loops"] ?? null), "forumrow", array()));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["forumrow"]) {
            // line 2
            echo "\t";
            if ((($this->getAttribute($context["forumrow"], "S_IS_CAT", array()) &&  !$this->getAttribute($context["forumrow"], "S_FIRST_ROW", array())) || $this->getAttribute($context["forumrow"], "S_NO_CAT", array()))) {
                // line 3
                echo "\t\t\t</ul>

\t\t\t</div>
\t\t</div>
\t</div>
\t";
            }
            // line 9
            echo "
\t";
            // line 10
            // line 11
            echo "
";
            // line 12
            if ((($this->getAttribute($context["forumrow"], "S_IS_CAT", array()) || $this->getAttribute($context["forumrow"], "S_FIRST_ROW", array())) || $this->getAttribute($context["forumrow"], "S_NO_CAT", array()))) {
                // line 13
                echo "\t";
                // line 14
                echo "\t";
                if ((( !($context["S_INDEX"] ?? null) && $this->getAttribute($context["forumrow"], "S_FIRST_ROW", array())) &&  !$this->getAttribute($context["forumrow"], "S_IS_CAT", array()))) {
                    // line 15
                    echo "\t<div class=\"no-collapse-box\">
\t";
                } else {
                    // line 17
                    echo "\t<div id=\"category-";
                    echo $this->getAttribute($context["forumrow"], "FORUM_ID", array());
                    echo "\" class=\"collapse-box\">
\t\t<h2>";
                    // line 18
                    if ($this->getAttribute($context["forumrow"], "S_IS_CAT", array())) {
                        echo "<a href=\"";
                        echo $this->getAttribute($context["forumrow"], "U_VIEWFORUM", array());
                        echo "\">";
                        echo $this->getAttribute($context["forumrow"], "FORUM_NAME", array());
                        echo "</a>";
                    } else {
                        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("FORUMS");
                    }
                    echo "</h2>
\t";
                }
                // line 20
                echo "\t";
                // line 21
                echo "
\t<div class=\"forabg forum-blocks\">
\t\t<div class=\"inner\">
\t\t\t<ul class=\"forums\">
";
            }
            // line 26
            // line 27
            echo "
\t";
            // line 28
            if ( !$this->getAttribute($context["forumrow"], "S_IS_CAT", array())) {
                // line 29
                echo "\t\t";
                // line 30
                echo "\t\t<li class=\"row\">
\t\t\t";
                // line 31
                // line 32
                echo "\t\t\t<dl";
                if ($this->getAttribute($context["forumrow"], "S_UNREAD_FORUM", array())) {
                    echo " class=\"unread\"";
                }
                echo ">
\t\t\t\t<dt title=\"";
                // line 33
                echo $this->getAttribute($context["forumrow"], "FORUM_FOLDER_IMG_ALT", array());
                echo "\">
\t\t\t\t\t";
                // line 34
                if ($this->getAttribute($context["forumrow"], "FORUM_IMAGE", array())) {
                    // line 35
                    echo "\t\t\t\t\t";
                    // line 36
                    echo "\t\t\t\t\t<span class=\"forum-image\">";
                    echo " ";
                    echo $this->getAttribute($context["forumrow"], "FORUM_IMAGE", array());
                    echo "</span>
\t\t\t\t\t";
                    // line 37
                    // line 38
                    echo "\t\t\t\t\t";
                }
                // line 39
                echo "\t\t\t\t\t<a href=\"";
                echo $this->getAttribute($context["forumrow"], "U_VIEWFORUM", array());
                echo "\" class=\"icon-link";
                if ( !$this->getAttribute($context["forumrow"], "FORUM_IMAGE", array())) {
                    echo " no-forum-image ";
                    echo $this->getAttribute($context["forumrow"], "FORUM_IMG_STYLE", array());
                }
                echo "\"></a>
\t\t\t\t\t";
                // line 40
                if ((twig_length_filter($this->env, $this->getAttribute($context["forumrow"], "subforum", array())) && $this->getAttribute($context["forumrow"], "S_LIST_SUBFORUMS", array()))) {
                    // line 41
                    echo "\t\t\t\t\t<div class=\"dropdown-container dropdown-button-control\">
\t\t\t\t\t\t<span title=\"";
                    // line 42
                    echo $this->getAttribute($context["forumrow"], "L_SUBFORUM_STR", array());
                    echo "\" class=\"dropdown-trigger\"></span>
\t\t\t\t\t\t<div class=\"dropdown hidden\">
\t\t\t\t\t\t\t<div class=\"dropdown-contents\">
\t\t\t\t\t\t\t";
                    // line 45
                    // line 46
                    echo "\t\t\t\t\t\t\t<strong>";
                    echo $this->getAttribute($context["forumrow"], "L_SUBFORUM_STR", array());
                    echo $this->env->getExtension('phpbb\template\twig\extension')->lang("COLON");
                    echo "</strong>
\t\t\t\t\t\t\t";
                    // line 47
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable($this->getAttribute($context["forumrow"], "subforum", array()));
                    foreach ($context['_seq'] as $context["_key"] => $context["subforum"]) {
                        // line 48
                        echo "\t\t\t\t\t\t\t\t";
                        echo "<a href=\"";
                        echo $this->getAttribute($context["subforum"], "U_SUBFORUM", array());
                        echo "\" class=\"subforum";
                        if ($this->getAttribute($context["subforum"], "S_UNREAD", array())) {
                            echo " unread";
                        } else {
                            echo " read";
                        }
                        echo "\" title=\"";
                        if ($this->getAttribute($context["subforum"], "S_UNREAD", array())) {
                            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("UNREAD_POSTS");
                        } else {
                            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("NO_UNREAD_POSTS");
                        }
                        echo "\">
\t\t\t\t\t\t\t\t<i class=\"icon ";
                        // line 49
                        if ($this->getAttribute($context["subforum"], "IS_LINK", array())) {
                            echo "fa-external-link";
                        } else {
                            echo "fa-file-o";
                        }
                        echo " fa-fw ";
                        if ($this->getAttribute($context["subforum"], "S_UNREAD", array())) {
                            echo " icon-red";
                        } else {
                            echo " icon-blue";
                        }
                        echo " icon-md\" aria-hidden=\"true\"></i><span>";
                        echo $this->getAttribute($context["subforum"], "SUBFORUM_NAME", array());
                        echo "</span></a>";
                        // line 50
                        echo "\t\t\t\t\t\t\t";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['subforum'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 51
                    echo "\t\t\t\t\t\t\t";
                    // line 52
                    echo "\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t\t";
                }
                // line 56
                echo "\t\t\t\t\t<div class=\"list-inner\">
\t\t\t\t\t\t<a href=\"";
                // line 57
                echo $this->getAttribute($context["forumrow"], "U_VIEWFORUM", array());
                echo "\" class=\"forumtitle\">";
                echo $this->getAttribute($context["forumrow"], "FORUM_NAME", array());
                echo "</a>
\t\t\t\t\t\t<span class=\"forum-description\">";
                // line 58
                echo $this->getAttribute($context["forumrow"], "FORUM_DESC", array());
                echo "</span>
\t\t\t\t\t\t";
                // line 59
                if ($this->getAttribute($context["forumrow"], "MODERATORS", array())) {
                    // line 60
                    echo "\t\t\t\t\t\t\t<!--<br /><span class=\"forum-moderators\"><strong>";
                    echo $this->getAttribute($context["forumrow"], "L_MODERATOR_STR", array());
                    echo $this->env->getExtension('phpbb\template\twig\extension')->lang("COLON");
                    echo "</strong> ";
                    echo $this->getAttribute($context["forumrow"], "MODERATORS", array());
                    echo "</span>-->
\t\t\t\t\t\t";
                }
                // line 62
                echo "\t\t\t\t\t</div>
\t\t\t\t</dt>

\t\t\t\t";
                // line 65
                if ($this->getAttribute($context["forumrow"], "CLICKS", array())) {
                    // line 66
                    echo "\t\t\t\t\t<dd class=\"redirect\"><span>";
                    echo $this->env->getExtension('phpbb\template\twig\extension')->lang("REDIRECTS");
                    echo $this->env->getExtension('phpbb\template\twig\extension')->lang("COLON");
                    echo " ";
                    echo $this->getAttribute($context["forumrow"], "CLICKS", array());
                    echo "</span></dd>
\t\t\t\t";
                } elseif ( !$this->getAttribute(                // line 67
$context["forumrow"], "S_IS_LINK", array())) {
                    // line 68
                    echo "\t\t\t\t\t<dd class=\"forum-stats\"><span>
\t\t\t\t\t\t";
                    // line 69
                    if ($this->getAttribute($context["forumrow"], "LAST_POST_TIME", array())) {
                        echo "(<dfn>";
                        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("TOPICS");
                        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("COLON");
                        echo "</dfn> ";
                        echo $this->getAttribute($context["forumrow"], "TOPICS", array());
                        echo " | <dfn>";
                        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("POSTS");
                        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("COLON");
                        echo "</dfn>";
                        echo $this->getAttribute($context["forumrow"], "POSTS", array());
                        echo ")
\t\t\t\t\t\t";
                        // line 70
                        if ( !($context["S_IS_BOT"] ?? null)) {
                            echo "<a href=\"";
                            echo $this->getAttribute($context["forumrow"], "U_LAST_POST", array());
                            echo "\" title=\"";
                            if ($this->getAttribute($context["forumrow"], "S_UNREAD_FORUM", array())) {
                                echo $this->env->getExtension('phpbb\template\twig\extension')->lang("UNREAD_POSTS");
                            } else {
                                echo $this->env->getExtension('phpbb\template\twig\extension')->lang("NO_UNREAD_POSTS");
                            }
                            echo "\">";
                            echo ($context["LAST_POST_IMG"] ?? null);
                            echo "</a>";
                        }
                    } else {
                        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("NO_POSTS");
                    }
                    // line 71
                    echo "\t\t\t\t\t\t";
                    // line 72
                    echo "\t\t\t\t\t</span></dd>

\t\t\t\t\t<dd class=\"mcp-status\"><span>
\t\t\t\t\t\t";
                    // line 75
                    if ($this->getAttribute($context["forumrow"], "U_UNAPPROVED_TOPICS", array())) {
                        // line 76
                        echo "\t\t\t\t\t\t\t<a href=\"";
                        echo $this->getAttribute($context["forumrow"], "U_UNAPPROVED_TOPICS", array());
                        echo "\">";
                        echo ($context["UNAPPROVED_IMG"] ?? null);
                        echo "</a>
\t\t\t\t\t\t";
                    } elseif ($this->getAttribute(                    // line 77
$context["forumrow"], "U_UNAPPROVED_POSTS", array())) {
                        // line 78
                        echo "\t\t\t\t\t\t\t<a href=\"";
                        echo $this->getAttribute($context["forumrow"], "U_UNAPPROVED_POSTS", array());
                        echo "\">";
                        echo ($context["UNAPPROVED_POST_IMG"] ?? null);
                        echo "</a>
\t\t\t\t\t\t";
                    }
                    // line 80
                    echo "\t\t\t\t\t\t</span>
\t\t\t\t\t</dd>
\t\t\t\t";
                }
                // line 83
                echo "\t\t\t</dl>
\t\t\t";
                // line 84
                // line 85
                echo "\t\t</li>
\t\t";
                // line 86
                // line 87
                echo "\t";
            }
            // line 88
            echo "
";
            // line 89
            if ($this->getAttribute($context["forumrow"], "S_LAST_ROW", array())) {
                // line 90
                echo "\t\t\t</ul>

\t\t\t</div>
\t\t</div>
\t</div>

";
                // line 96
            }
            // line 98
            echo "
";
            $context['_iterated'] = true;
        }
        if (!$context['_iterated']) {
            // line 100
            echo "\t<div class=\"panel\">
\t\t<div class=\"inner\">
\t\t<strong>";
            // line 102
            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("NO_FORUMS");
            echo "</strong>
\t\t</div>
\t</div>
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['forumrow'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
    }

    public function getTemplateName()
    {
        return "forumlist_body.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  338 => 102,  334 => 100,  328 => 98,  326 => 96,  318 => 90,  316 => 89,  313 => 88,  310 => 87,  309 => 86,  306 => 85,  305 => 84,  302 => 83,  297 => 80,  289 => 78,  287 => 77,  280 => 76,  278 => 75,  273 => 72,  271 => 71,  254 => 70,  240 => 69,  237 => 68,  235 => 67,  227 => 66,  225 => 65,  220 => 62,  211 => 60,  209 => 59,  205 => 58,  199 => 57,  196 => 56,  190 => 52,  188 => 51,  182 => 50,  167 => 49,  149 => 48,  145 => 47,  139 => 46,  138 => 45,  132 => 42,  129 => 41,  127 => 40,  117 => 39,  114 => 38,  113 => 37,  107 => 36,  105 => 35,  103 => 34,  99 => 33,  92 => 32,  91 => 31,  88 => 30,  86 => 29,  84 => 28,  81 => 27,  80 => 26,  73 => 21,  71 => 20,  58 => 18,  53 => 17,  49 => 15,  46 => 14,  44 => 13,  42 => 12,  39 => 11,  38 => 10,  35 => 9,  27 => 3,  24 => 2,  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "forumlist_body.html", "");
    }
}
