<?php

/* @flerex_linkedaccounts/event/navbar_header_profile_list_after.html */
class __TwigTemplate_069ac8920f17207d05cbc39753d2274aa21e7e9d8245049db0cdc07df9d8b4d0 extends Twig_Template
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
        if (($context["switchable_account"] ?? null)) {
            // line 2
            $asset_file = "@flerex_linkedaccounts/linkedaccounts.css";
            $asset = new \phpbb\template\asset($asset_file, $this->getEnvironment()->get_path_helper(), $this->getEnvironment()->get_filesystem());
            if (substr($asset_file, 0, 2) !== './' && $asset->is_relative()) {
                $asset_path = $asset->get_path();                $local_file = $this->getEnvironment()->get_phpbb_root_path() . $asset_path;
                if (!file_exists($local_file)) {
                    $local_file = $this->getEnvironment()->findTemplate($asset_path);
                    $asset->set_path($local_file, true);
                }
                $asset->add_assets_version('13');
            }
            $this->getEnvironment()->get_assets_bag()->add_stylesheet($asset);            // line 3
            $asset_file = "@flerex_linkedaccounts/switcher.js";
            $asset = new \phpbb\template\asset($asset_file, $this->getEnvironment()->get_path_helper(), $this->getEnvironment()->get_filesystem());
            if (substr($asset_file, 0, 2) !== './' && $asset->is_relative()) {
                $asset_path = $asset->get_path();                $local_file = $this->getEnvironment()->get_phpbb_root_path() . $asset_path;
                if (!file_exists($local_file)) {
                    $local_file = $this->getEnvironment()->findTemplate($asset_path);
                    $asset->set_path($local_file, true);
                }
                $asset->add_assets_version('13');
            }
            $this->getEnvironment()->get_assets_bag()->add_script($asset);            // line 4
            echo "<li id=\"linked_accounts\" class=\"bg1\">
\t<ul>
\t\t";
            // line 6
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["switchable_account"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["account"]) {
                // line 7
                echo "\t\t<li>
\t\t\t";
                // line 8
                if (($context["U_CAN_LINK_ACCOUNT"] ?? null)) {
                    // line 9
                    echo "\t\t\t\t<a href=\"";
                    echo $this->getAttribute($context["account"], "SWITCH_LINK", array());
                    echo "\" role=\"menuitem\" data-ajax=\"flerex.linked_accounts.switch\" data-refresh=\"true\">
\t\t\t\t\t";
                    // line 10
                    if ($this->getAttribute($context["account"], "AVATAR", array())) {
                        // line 11
                        echo "\t\t\t\t\t\t";
                        echo $this->getAttribute($context["account"], "AVATAR", array());
                        echo "
\t\t\t\t\t";
                    } else {
                        // line 13
                        echo "\t\t\t\t\t\t<img src=\"";
                        echo ($context["T_THEME_PATH"] ?? null);
                        echo "/images/no_avatar.gif\" class=\"avatar\" alt=\"\">
\t\t\t\t\t";
                    }
                    // line 15
                    echo "\t\t\t\t\t";
                    echo $this->getAttribute($context["account"], "NAME", array());
                    echo "
\t\t\t\t</a>
\t\t\t";
                } else {
                    // line 18
                    echo "\t\t\t\t";
                    if ($this->getAttribute($context["account"], "AVATAR", array())) {
                        // line 19
                        echo "\t\t\t\t\t";
                        echo $this->getAttribute($context["account"], "AVATAR", array());
                        echo "
\t\t\t\t";
                    } else {
                        // line 21
                        echo "\t\t\t\t\t<img src=\"";
                        echo ($context["T_THEME_PATH"] ?? null);
                        echo "/images/no_avatar.gif\" class=\"avatar\" alt=\"\">
\t\t\t\t";
                    }
                    // line 23
                    echo "\t\t\t\t";
                    echo $this->getAttribute($context["account"], "NAME", array());
                    echo "
\t\t\t";
                }
                // line 25
                echo "\t\t</li>
\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['account'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 27
            echo "\t</ul>
</li>
";
        }
    }

    public function getTemplateName()
    {
        return "@flerex_linkedaccounts/event/navbar_header_profile_list_after.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  110 => 27,  103 => 25,  97 => 23,  91 => 21,  85 => 19,  82 => 18,  75 => 15,  69 => 13,  63 => 11,  61 => 10,  56 => 9,  54 => 8,  51 => 7,  47 => 6,  43 => 4,  32 => 3,  21 => 2,  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "@flerex_linkedaccounts/event/navbar_header_profile_list_after.html", "");
    }
}
