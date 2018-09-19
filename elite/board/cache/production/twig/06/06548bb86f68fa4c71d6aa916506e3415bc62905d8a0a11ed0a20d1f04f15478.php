<?php

/* navbar_header.html */
class __TwigTemplate_75c5803573576e2c490ce96be15423f52c1e014760030e31338b091843c944d6 extends Twig_Template
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
        echo "<div class=\"navblock\" role=\"navigation\">
\t<div class=\"inner\">
\t<ul id=\"nav-main\" class=\"nav-main linklist\" role=\"menubar\">
\t\t<li id=\"quick-links\" class=\"quick-links dropdown-container responsive-menu";
        // line 4
        if (( !($context["S_DISPLAY_QUICK_LINKS"] ?? null) &&  !($context["S_DISPLAY_SEARCH"] ?? null))) {
            echo " hidden";
        }
        echo "\" data-skip-responsive=\"true\">
\t\t\t<a href=\"#\" class=\"dropdown-trigger\">
\t\t\t\t<i class=\"icon fa-bars fa-fw\" aria-hidden=\"true\"></i><span>";
        // line 6
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("QUICK_LINKS");
        echo "</span>
\t\t\t</a>
\t\t\t<div class=\"dropdown\">
\t\t\t\t<div class=\"pointer\"><div class=\"pointer-inner\"></div></div>
\t\t\t\t<ul class=\"dropdown-contents\" role=\"menu\">
\t\t\t\t\t";
        // line 11
        // line 12
        echo "
\t\t\t\t\t";
        // line 13
        if (($context["S_DISPLAY_SEARCH"] ?? null)) {
            // line 14
            echo "\t\t\t\t\t\t<li class=\"separator\"></li>
\t\t\t\t\t\t";
            // line 15
            if (($context["S_REGISTERED_USER"] ?? null)) {
                // line 16
                echo "\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t<a href=\"";
                // line 17
                echo ($context["U_SEARCH_SELF"] ?? null);
                echo "\" role=\"menuitem\">
\t\t\t\t\t\t\t\t<i class=\"icon fa-user fa-fw icon-gray\" aria-hidden=\"true\"></i><span>";
                // line 18
                echo $this->env->getExtension('phpbb\template\twig\extension')->lang("SEARCH_SELF");
                echo "</span>
\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t</li>
\t\t\t\t\t\t";
            }
            // line 22
            echo "\t\t\t\t\t\t";
            if (($context["S_USER_LOGGED_IN"] ?? null)) {
                // line 23
                echo "\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t<a href=\"";
                // line 24
                echo ($context["U_SEARCH_NEW"] ?? null);
                echo "\" role=\"menuitem\">
\t\t\t\t\t\t\t\t<i class=\"icon fa-flash fa-fw icon-red\" aria-hidden=\"true\"></i><span>";
                // line 25
                echo $this->env->getExtension('phpbb\template\twig\extension')->lang("SEARCH_NEW");
                echo "</span>
\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t</li>
\t\t\t\t\t\t";
            }
            // line 29
            echo "\t\t\t\t\t\t";
            if (($context["S_LOAD_UNREADS"] ?? null)) {
                // line 30
                echo "\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t<a href=\"";
                // line 31
                echo ($context["U_SEARCH_UNREAD"] ?? null);
                echo "\" role=\"menuitem\">
\t\t\t\t\t\t\t\t<i class=\"icon fa-eye fa-fw icon-red\" aria-hidden=\"true\"></i><span>";
                // line 32
                echo $this->env->getExtension('phpbb\template\twig\extension')->lang("SEARCH_UNREAD");
                echo "</span>
\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t</li>
\t\t\t\t\t\t";
            }
            // line 36
            echo "\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t<a href=\"";
            // line 37
            echo ($context["U_SEARCH_UNANSWERED"] ?? null);
            echo "\" role=\"menuitem\">
\t\t\t\t\t\t\t\t<i class=\"icon fa-child fa-fw icon-gray\" aria-hidden=\"true\"></i><span>";
            // line 38
            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("SEARCH_UNANSWERED");
            echo "</span>
\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t</li>
\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t<a href=\"";
            // line 42
            echo ($context["U_SEARCH_ACTIVE_TOPICS"] ?? null);
            echo "\" role=\"menuitem\">
\t\t\t\t\t\t\t\t<i class=\"icon fa-comments-o fa-fw icon-blue\" aria-hidden=\"true\"></i><span>";
            // line 43
            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("SEARCH_ACTIVE_TOPICS");
            echo "</span>
\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t</li>
\t\t\t\t\t\t<li class=\"separator\"></li>
\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t<a href=\"";
            // line 48
            echo ($context["U_SEARCH"] ?? null);
            echo "\" role=\"menuitem\">
\t\t\t\t\t\t\t\t<i class=\"icon fa-search fa-fw\" aria-hidden=\"true\"></i><span>";
            // line 49
            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("SEARCH");
            echo "</span>
\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t</li>
\t\t\t\t\t";
        }
        // line 53
        echo "
\t\t\t\t\t";
        // line 54
        if (( !($context["S_IS_BOT"] ?? null) && (($context["S_DISPLAY_MEMBERLIST"] ?? null) || ($context["U_TEAM"] ?? null)))) {
            // line 55
            echo "\t\t\t\t\t\t<li class=\"separator\"></li>

\t\t\t\t\t\t";
            // line 57
            if (($context["S_DISPLAY_MEMBERLIST"] ?? null)) {
                // line 58
                echo "\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t<a href=\"";
                // line 59
                echo ($context["U_MEMBERLIST"] ?? null);
                echo "\" role=\"menuitem\">
\t\t\t\t\t\t\t\t<i class=\"icon fa-group fa-fw\" aria-hidden=\"true\"></i><span>";
                // line 60
                echo $this->env->getExtension('phpbb\template\twig\extension')->lang("MEMBERLIST");
                echo "</span>
\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t</li>
\t\t\t\t\t\t";
            }
            // line 64
            echo "\t\t\t\t\t\t";
            if (($context["U_TEAM"] ?? null)) {
                // line 65
                echo "\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t<a href=\"";
                // line 66
                echo ($context["U_TEAM"] ?? null);
                echo "\" role=\"menuitem\">
\t\t\t\t\t\t\t\t<i class=\"icon fa-shield fa-fw\" aria-hidden=\"true\"></i><span>";
                // line 67
                echo $this->env->getExtension('phpbb\template\twig\extension')->lang("THE_TEAM");
                echo "</span>
\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t</li>
\t\t\t\t\t\t";
            }
            // line 71
            echo "

\t\t\t\t\t";
        }
        // line 74
        echo "\t\t\t\t\t<li class=\"separator\"></li>

\t\t\t\t\t";
        // line 76
        // line 77
        echo "\t\t\t\t</ul>
\t\t\t</div>
\t\t</li>

\t";
        // line 81
        if (($context["S_REGISTERED_USER"] ?? null)) {
            // line 82
            echo "\t\t";
            // line 83
            echo "\t\t<li id=\"username_logged_in\" class=\"rightside ";
            if (($context["CURRENT_USER_AVATAR"] ?? null)) {
                echo " no-bulletin";
            }
            echo "\" data-skip-responsive=\"true\">
\t\t\t";
            // line 84
            // line 85
            echo "\t\t\t<div class=\"header-profile dropdown-container\">
\t\t\t\t<a href=\"";
            // line 86
            echo ($context["U_PROFILE"] ?? null);
            echo "\" class=\"header-avatar dropdown-trigger\">";
            if (($context["CURRENT_USER_AVATAR"] ?? null)) {
                echo ($context["CURRENT_USER_AVATAR"] ?? null);
                echo " ";
            }
            echo ($context["CURRENT_USERNAME_SIMPLE"] ?? null);
            echo "</a>
\t\t\t\t<div class=\"dropdown hidden\">
\t\t\t\t\t<div class=\"pointer\"><div class=\"pointer-inner\"></div></div>
\t\t\t\t\t<ul class=\"dropdown-contents\" role=\"menu\">

\t\t\t\t\t\t";
            // line 91
            if (($context["U_RESTORE_PERMISSIONS"] ?? null)) {
                // line 92
                echo "\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t<a href=\"";
                // line 93
                echo ($context["U_RESTORE_PERMISSIONS"] ?? null);
                echo "\">
\t\t\t\t\t\t\t\t<i class=\"icon fa-refresh fa-fw\" aria-hidden=\"true\"></i><span>";
                // line 94
                echo $this->env->getExtension('phpbb\template\twig\extension')->lang("RESTORE_PERMISSIONS");
                echo "</span>
\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t</li>
\t\t\t\t\t\t";
            }
            // line 98
            echo "
\t\t\t\t\t\t";
            // line 99
            // line 100
            echo "\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t<a href=\"";
            // line 101
            echo ($context["U_PROFILE"] ?? null);
            echo "\" title=\"";
            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("PROFILE");
            echo "\" role=\"menuitem\">
\t\t\t\t\t\t\t\t<i class=\"icon fa-sliders fa-fw\" aria-hidden=\"true\"></i><span>";
            // line 102
            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("PROFILE");
            echo "</span>
\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t</li>

\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t<a href=\"";
            // line 107
            echo ($context["U_USER_PROFILE"] ?? null);
            echo "\" title=\"";
            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("READ_PROFILE");
            echo "\" role=\"menuitem\">
\t\t\t\t\t\t\t\t<i class=\"icon fa-user fa-fw\" aria-hidden=\"true\"></i><span>";
            // line 108
            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("READ_PROFILE");
            echo "</span>
\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t</li>

\t\t\t\t\t\t";
            // line 112
            $previous_look_up_order = $this->env->getNamespaceLookUpOrder();
            $this->env->setNamespaceLookUpOrder(array('flerex_linkedaccounts', '__main__'));
            $this->env->loadTemplate('@flerex_linkedaccounts/event/navbar_header_profile_list_after.html')->display($context);
            $this->env->setNamespaceLookUpOrder($previous_look_up_order);
            // line 113
            echo "
\t\t\t\t\t\t<li class=\"separator\"></li>

\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t<a href=\"";
            // line 117
            echo ($context["U_LOGIN_LOGOUT"] ?? null);
            echo "\" title=\"";
            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("LOGIN_LOGOUT");
            echo "\" accesskey=\"x\" role=\"menuitem\">
\t\t\t\t\t\t\t\t<i class=\"icon fa-power-off fa-fw\" aria-hidden=\"true\"></i><span>";
            // line 118
            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("LOGIN_LOGOUT");
            echo "</span>
\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t</li>

\t\t\t\t\t</ul>
\t\t\t\t</div>
\t\t\t</div>
\t\t\t";
            // line 125
            // line 126
            echo "\t\t</li>
\t\t";
            // line 127
            if (($context["S_DISPLAY_PM"] ?? null)) {
                // line 128
                echo "\t\t\t<li class=\"rightside\" data-skip-responsive=\"true\">
\t\t\t\t<a href=\"";
                // line 129
                echo ($context["U_PRIVATEMSGS"] ?? null);
                echo "\" role=\"menuitem\">
\t\t\t\t\t<i class=\"icon fa-inbox fa-fw\" aria-hidden=\"true\"></i><span>";
                // line 130
                echo $this->env->getExtension('phpbb\template\twig\extension')->lang("PRIVATE_MESSAGES");
                echo " </span><strong class=\"badge";
                if ( !($context["PRIVATE_MESSAGE_COUNT"] ?? null)) {
                    echo " hidden";
                }
                echo "\">";
                echo ($context["PRIVATE_MESSAGE_COUNT"] ?? null);
                echo "</strong>
\t\t\t\t</a>
\t\t\t</li>
\t\t";
            }
            // line 134
            echo "\t\t";
            if (($context["S_NOTIFICATIONS_DISPLAY"] ?? null)) {
                // line 135
                echo "\t\t<li class=\"dropdown-container dropdown-";
                echo ($context["S_CONTENT_FLOW_END"] ?? null);
                echo " rightside\" data-skip-responsive=\"true\">
\t\t\t<a href=\"";
                // line 136
                echo ($context["U_VIEW_ALL_NOTIFICATIONS"] ?? null);
                echo "\" id=\"notification_list_button\" class=\"dropdown-trigger\">
\t\t\t\t<i class=\"icon fa-bell fa-fw\" aria-hidden=\"true\"></i><span>";
                // line 137
                echo $this->env->getExtension('phpbb\template\twig\extension')->lang("NOTIFICATIONS");
                echo " </span><strong class=\"badge";
                if ( !($context["NOTIFICATIONS_COUNT"] ?? null)) {
                    echo " hidden";
                }
                echo "\">";
                echo ($context["NOTIFICATIONS_COUNT"] ?? null);
                echo "</strong>
\t\t\t</a>
\t\t\t";
                // line 139
                $location = "notification_dropdown.html";
                $namespace = false;
                if (strpos($location, '@') === 0) {
                    $namespace = substr($location, 1, strpos($location, '/') - 1);
                    $previous_look_up_order = $this->env->getNamespaceLookUpOrder();
                    $this->env->setNamespaceLookUpOrder(array($namespace, '__main__'));
                }
                $this->loadTemplate("notification_dropdown.html", "navbar_header.html", 139)->display($context);
                if ($namespace) {
                    $this->env->setNamespaceLookUpOrder($previous_look_up_order);
                }
                // line 140
                echo "\t\t</li>
\t\t";
            }
            // line 142
            echo "\t\t";
            // line 143
            echo "\t</ul>

\t<ul class=\"linklist\" role=\"menubar\">
\t";
        }
        // line 147
        echo "\t\t";
        if (( !($context["S_USER_LOGGED_IN"] ?? null) &&  !($context["S_IS_BOT"] ?? null))) {
            // line 148
            echo "\t\t\t<li class=\"rightside\"  data-skip-responsive=\"true\">
\t\t\t\t<a href=\"";
            // line 149
            echo ($context["U_LOGIN_LOGOUT"] ?? null);
            echo "\" title=\"";
            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("LOGIN_LOGOUT");
            echo "\" accesskey=\"x\" role=\"menuitem\">
\t\t\t\t\t<i class=\"icon fa-power-off fa-fw\" aria-hidden=\"true\"></i><span>";
            // line 150
            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("LOGIN_LOGOUT");
            echo "</span>
\t\t\t\t</a>
\t\t\t</li>
\t\t\t";
            // line 153
            if ((($context["S_REGISTER_ENABLED"] ?? null) &&  !(($context["S_SHOW_COPPA"] ?? null) || ($context["S_REGISTRATION"] ?? null)))) {
                // line 154
                echo "\t\t\t<li class=\"rightside\" data-skip-responsive=\"true\">
\t\t\t\t<a href=\"";
                // line 155
                echo ($context["U_REGISTER"] ?? null);
                echo "\" role=\"menuitem\">
\t\t\t\t\t<i class=\"icon fa-pencil-square-o  fa-fw\" aria-hidden=\"true\"></i><span>";
                // line 156
                echo $this->env->getExtension('phpbb\template\twig\extension')->lang("REGISTER");
                echo "</span>
\t\t\t\t</a>
\t\t\t</li>
\t\t\t";
            }
            // line 160
            echo "\t\t\t";
            // line 161
            echo "\t\t";
        }
        // line 162
        echo "
\t\t";
        // line 163
        if (($context["U_ACP"] ?? null)) {
            // line 164
            echo "\t\t<li data-last-responsive=\"true\" class=\"rightside\"  >
\t\t\t<a href=\"";
            // line 165
            echo ($context["U_ACP"] ?? null);
            echo "\" title=\"";
            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("ACP");
            echo "\" role=\"menuitem\">
\t\t\t\t<i class=\"icon fa-gears fa-fw\" aria-hidden=\"true\"></i><span>";
            // line 166
            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("ACP_SHORT");
            echo "</span>
\t\t\t</a>
\t\t</li>
\t\t";
        }
        // line 170
        echo "\t\t";
        if (($context["U_MCP"] ?? null)) {
            // line 171
            echo "\t\t<li data-last-responsive=\"true\" class=\"rightside\"  >
\t\t\t<a href=\"";
            // line 172
            echo ($context["U_MCP"] ?? null);
            echo "\" title=\"";
            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("MCP");
            echo "\" role=\"menuitem\">
\t\t\t\t<i class=\"icon fa-legal fa-fw\" aria-hidden=\"true\"></i><span>";
            // line 173
            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("MCP_SHORT");
            echo "</span>
\t\t\t</a>
\t\t</li>
\t\t";
        }
        // line 177
        echo "\t\t";
        // line 178
        echo "
\t\t<li data-last-responsive=\"true\" class=\"rightside\"  >
\t\t\t<a href=\"";
        // line 180
        echo ($context["U_FAQ"] ?? null);
        echo "\" title=\"";
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("FAQ_EXPLAIN");
        echo "\" role=\"menuitem\">
\t\t\t\t<i class=\"icon fa-question-circle fa-fw\" aria-hidden=\"true\"></i><span>";
        // line 181
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("FAQ");
        echo "</span>
\t\t\t</a>
\t\t</li>

\t\t";
        // line 185
        // line 186
        echo "\t\t";
        if (($context["HEADERLINKS_CODE"] ?? null)) {
            echo ($context["HEADERLINKS_CODE"] ?? null);
        }
        // line 187
        echo "\t</ul>

\t</div>
</div>
";
    }

    public function getTemplateName()
    {
        return "navbar_header.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  476 => 187,  471 => 186,  470 => 185,  463 => 181,  457 => 180,  453 => 178,  451 => 177,  444 => 173,  438 => 172,  435 => 171,  432 => 170,  425 => 166,  419 => 165,  416 => 164,  414 => 163,  411 => 162,  408 => 161,  406 => 160,  399 => 156,  395 => 155,  392 => 154,  390 => 153,  384 => 150,  378 => 149,  375 => 148,  372 => 147,  366 => 143,  364 => 142,  360 => 140,  348 => 139,  337 => 137,  333 => 136,  328 => 135,  325 => 134,  312 => 130,  308 => 129,  305 => 128,  303 => 127,  300 => 126,  299 => 125,  289 => 118,  283 => 117,  277 => 113,  272 => 112,  265 => 108,  259 => 107,  251 => 102,  245 => 101,  242 => 100,  241 => 99,  238 => 98,  231 => 94,  227 => 93,  224 => 92,  222 => 91,  208 => 86,  205 => 85,  204 => 84,  197 => 83,  195 => 82,  193 => 81,  187 => 77,  186 => 76,  182 => 74,  177 => 71,  170 => 67,  166 => 66,  163 => 65,  160 => 64,  153 => 60,  149 => 59,  146 => 58,  144 => 57,  140 => 55,  138 => 54,  135 => 53,  128 => 49,  124 => 48,  116 => 43,  112 => 42,  105 => 38,  101 => 37,  98 => 36,  91 => 32,  87 => 31,  84 => 30,  81 => 29,  74 => 25,  70 => 24,  67 => 23,  64 => 22,  57 => 18,  53 => 17,  50 => 16,  48 => 15,  45 => 14,  43 => 13,  40 => 12,  39 => 11,  31 => 6,  24 => 4,  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "navbar_header.html", "");
    }
}
