<?php

/* overall_footer.html */
class __TwigTemplate_38bf4950a2d0944a86d9169a82818e902a7b24feb15ded34f1ec686671176231 extends Twig_Template
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
        echo "\t\t";
        // line 2
        echo "\t</div>

";
        // line 4
        // line 5
        echo "
<div id=\"page-footer\" class=\"page-footer\" role=\"contentinfo\">
\t";
        // line 7
        $location = "navbar_footer.html";
        $namespace = false;
        if (strpos($location, '@') === 0) {
            $namespace = substr($location, 1, strpos($location, '/') - 1);
            $previous_look_up_order = $this->env->getNamespaceLookUpOrder();
            $this->env->setNamespaceLookUpOrder(array($namespace, '__main__'));
        }
        $this->loadTemplate("navbar_footer.html", "overall_footer.html", 7)->display($context);
        if ($namespace) {
            $this->env->setNamespaceLookUpOrder($previous_look_up_order);
        }
        // line 8
        echo "
\t<div class=\"copyright\">
\t\t";
        // line 10
        // line 11
        echo "\t\t";
        echo ($context["CREDIT_LINE"] ?? null);
        echo "
\t\t";
        // line 12
        if (($context["TRANSLATION_INFO"] ?? null)) {
            echo "<br />";
            echo ($context["TRANSLATION_INFO"] ?? null);
        }
        // line 13
        echo "\t\t";
        // line 14
        echo "\t\t";
        if (($context["DEBUG_OUTPUT"] ?? null)) {
            echo "<br />";
            echo ($context["DEBUG_OUTPUT"] ?? null);
        }
        // line 15
        echo "\t\t";
        if (($context["U_ACP"] ?? null)) {
            echo "<br /><strong><a href=\"";
            echo ($context["U_ACP"] ?? null);
            echo "\">";
            echo $this->env->getExtension('phpbb\template\twig\extension')->lang("ACP");
            echo "</a></strong>";
        }
        // line 16
        echo "\t</div>

\t<div id=\"darkenwrapper\" class=\"darkenwrapper\" data-ajax-error-title=\"";
        // line 18
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("AJAX_ERROR_TITLE");
        echo "\" data-ajax-error-text=\"";
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("AJAX_ERROR_TEXT");
        echo "\" data-ajax-error-text-abort=\"";
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("AJAX_ERROR_TEXT_ABORT");
        echo "\" data-ajax-error-text-timeout=\"";
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("AJAX_ERROR_TEXT_TIMEOUT");
        echo "\" data-ajax-error-text-parsererror=\"";
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("AJAX_ERROR_TEXT_PARSERERROR");
        echo "\">
\t\t<div id=\"darken\" class=\"darken\">&nbsp;</div>
\t</div>

\t<div id=\"phpbb_alert\" class=\"phpbb_alert\" data-l-err=\"";
        // line 22
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("ERROR");
        echo "\" data-l-timeout-processing-req=\"";
        echo $this->env->getExtension('phpbb\template\twig\extension')->lang("TIMEOUT_PROCESSING_REQ");
        echo "\">
\t\t<a href=\"#\" class=\"alert_close\"></a>
\t\t<h3 class=\"alert_title\">&nbsp;</h3><p class=\"alert_text\"></p>
\t</div>
\t<div id=\"phpbb_confirm\" class=\"phpbb_alert\">
\t\t<a href=\"#\" class=\"alert_close\"></a>
\t\t<div class=\"alert_text\"></div>
\t</div>
</div>

</div>

<div>
\t<a id=\"bottom\" class=\"anchor\" accesskey=\"z\"></a>
\t";
        // line 36
        if ( !($context["S_IS_BOT"] ?? null)) {
            echo ($context["RUN_CRON_TASK"] ?? null);
        }
        // line 37
        echo "</div>

<script type=\"text/javascript\" src=\"";
        // line 39
        echo ($context["T_JQUERY_LINK"] ?? null);
        echo "\"></script>
\t\t";
        // line 40
        if (($context["S_ALLOW_CDN"] ?? null)) {
            echo "<script type=\"text/javascript\">window.jQuery || document.write('\\x3Cscript src=\"";
            echo ($context["T_ASSETS_PATH"] ?? null);
            echo "/javascript/jquery.min.js?assets_version=";
            echo ($context["T_ASSETS_VERSION"] ?? null);
            echo "\">\\x3C/script>');</script>";
        }
        // line 41
        echo "<script type=\"text/javascript\" src=\"";
        echo ($context["T_ASSETS_PATH"] ?? null);
        echo "/javascript/core.js?assets_version=";
        echo ($context["T_ASSETS_VERSION"] ?? null);
        echo "\"></script>
";
        // line 42
        $asset_file = "forum_fn.js";
        $asset = new \phpbb\template\asset($asset_file, $this->getEnvironment()->get_path_helper(), $this->getEnvironment()->get_filesystem());
        if (substr($asset_file, 0, 2) !== './' && $asset->is_relative()) {
            $asset_path = $asset->get_path();            $local_file = $this->getEnvironment()->get_phpbb_root_path() . $asset_path;
            if (!file_exists($local_file)) {
                $local_file = $this->getEnvironment()->findTemplate($asset_path);
                $asset->set_path($local_file, true);
            }
            $asset->add_assets_version('13');
        }
        $this->getEnvironment()->get_assets_bag()->add_script($asset);        // line 43
        $asset_file = "ajax.js";
        $asset = new \phpbb\template\asset($asset_file, $this->getEnvironment()->get_path_helper(), $this->getEnvironment()->get_filesystem());
        if (substr($asset_file, 0, 2) !== './' && $asset->is_relative()) {
            $asset_path = $asset->get_path();            $local_file = $this->getEnvironment()->get_phpbb_root_path() . $asset_path;
            if (!file_exists($local_file)) {
                $local_file = $this->getEnvironment()->findTemplate($asset_path);
                $asset->set_path($local_file, true);
            }
            $asset->add_assets_version('13');
        }
        $this->getEnvironment()->get_assets_bag()->add_script($asset);        // line 44
        if (($context["S_ALLOW_CDN"] ?? null)) {
            // line 45
            echo "<script type=\"text/javascript\">
    (function(\$){
        var \$fa_cdn = \$('head').find('link[rel=\"stylesheet\"]').first(),
                \$span = \$('<span class=\"fa\" style=\"display:none\"></span>').appendTo('body');
        if (\$span.css('fontFamily') !== 'FontAwesome' ) {
            \$fa_cdn.after('<link href=\"";
            // line 50
            echo ($context["T_ASSETS_PATH"] ?? null);
            echo "/css/font-awesome.min.css\" rel=\"stylesheet\">');
            \$fa_cdn.remove();
        }
        \$span.remove();
    })(jQuery);
</script>
";
        }
        // line 57
        $asset_file = "jquery.collapse.js";
        $asset = new \phpbb\template\asset($asset_file, $this->getEnvironment()->get_path_helper(), $this->getEnvironment()->get_filesystem());
        if (substr($asset_file, 0, 2) !== './' && $asset->is_relative()) {
            $asset_path = $asset->get_path();            $local_file = $this->getEnvironment()->get_phpbb_root_path() . $asset_path;
            if (!file_exists($local_file)) {
                $local_file = $this->getEnvironment()->findTemplate($asset_path);
                $asset->set_path($local_file, true);
            }
            $asset->add_assets_version('13');
        }
        $this->getEnvironment()->get_assets_bag()->add_script($asset);        // line 58
        $asset_file = "jquery.collapse_storage.js";
        $asset = new \phpbb\template\asset($asset_file, $this->getEnvironment()->get_path_helper(), $this->getEnvironment()->get_filesystem());
        if (substr($asset_file, 0, 2) !== './' && $asset->is_relative()) {
            $asset_path = $asset->get_path();            $local_file = $this->getEnvironment()->get_phpbb_root_path() . $asset_path;
            if (!file_exists($local_file)) {
                $local_file = $this->getEnvironment()->findTemplate($asset_path);
                $asset->set_path($local_file, true);
            }
            $asset->add_assets_version('13');
        }
        $this->getEnvironment()->get_assets_bag()->add_script($asset);        // line 59
        echo "
<script>
jQuery(function(\$) {
\t'use strict';

\t/* Anchor jump offset for top-bar */
\tfunction scroll_if_anchor(href) {
\t\thref = typeof(href) == \"string\" ? href : \$(this).attr(\"href\");

\t\tif(!href) return;
\t\tvar fromTop = \$topBarHeight + 4;
\t\tvar \$target = \$(href);

\t\t// Older browsers without pushState might flicker here, as they momentarily jump to the wrong position (IE < 10)
\t\tif(\$target.length) {
\t\t\t\$('html, body').scrollTop(\$target.offset().top - fromTop);
\t\t\tif(history && \"pushState\" in history) {
\t\t\t\thistory.pushState({}, document.title, window.location.href.split(\"#\")[0] + href);
\t\t\t\t//window.location.hash = href;
\t\t\t\treturn false;
\t\t\t}
\t\t}
\t}

\tvar \$topBar = \$('#top-bar');
\tvar \$topBarHeight = 0;

\tif (\$topBar.length) {
\t\t\$topBarHeight = \$topBar.outerHeight();

\t\t\$(\"body\").on(\"click\", \"a[href^='#']\", scroll_if_anchor);

\t\tscroll_if_anchor(window.location.hash);
\t}

\t/* Collapse boxes */
\t\$('.stat-block.online-list').attr('id', 'online-list');
\t\$('.stat-block.birthday-list').attr('id', 'birthday-list');
\t\$('.stat-block.statistics').attr('id', 'statistics');

\t\$('.collapse-box > h2, .stat-block > h3').addClass(\"open\").find('a').contents().unwrap();

\t\$('.collapse-box, .stat-block').collapse({
\t\tpersist: true,
\t\topen: function() {
\t\t\tthis.stop(true,true);
\t\t\tthis.addClass(\"open\");
\t\t\tthis.slideDown(400);
\t\t},
\t\tclose: function() {
\t\t\tthis.stop(true,true);
\t\t\tthis.slideUp(400);
\t\t\tthis.removeClass(\"open\");
\t\t}
\t});

\tvar \$videoBG = \$('#video-background');
\tvar hasTopBar = \$('#top-bar').length;

\tfunction resizeVideoBG() {
\t\tvar height = \$(window).height();
\t\t\$videoBG.css('height', (height - 42) + 'px');
\t}

\tif (hasTopBar && \$videoBG.length) {
\t\t\$(window).resize(function() {
\t\t\tresizeVideoBG()
\t\t});
\t\tresizeVideoBG();
\t}

\t";
        // line 130
        if (($context["S_VIEWTOPIC"] ?? null)) {
            // line 131
            echo "\t/* Mini-profile context drop-down menus */
\tphpbb.dropdownVisibleContainers += ', .profile-context';

\t\$('.postprofile').each(function() {
\t\tvar \$this = \$(this),
\t\t\t\$trigger = \$this.find('dt a'),
\t\t\t\$contents = \$this.siblings('.profile-context').children('.dropdown'),
\t\t\toptions = {
\t\t\t\tdirection: 'auto',
\t\t\t\tverticalDirection: 'auto'
\t\t\t},
\t\t\tdata;

\t\tif (!\$trigger.length) {
\t\t\tdata = \$this.attr('data-dropdown-trigger');
\t\t\t\$trigger = data ? \$this.children(data) : \$this.children('a:first');
\t\t}

\t\tif (!\$contents.length) {
\t\t\tdata = \$this.attr('data-dropdown-contents');
\t\t\t\$contents = data ? \$this.children(data) : \$this.children('div:first');
\t\t}

\t\tif (!\$trigger.length || !\$contents.length) return;

\t\tif (\$this.hasClass('dropdown-up')) options.verticalDirection = 'up';
\t\tif (\$this.hasClass('dropdown-down')) options.verticalDirection = 'down';
\t\tif (\$this.hasClass('dropdown-left')) options.direction = 'left';
\t\tif (\$this.hasClass('dropdown-right')) options.direction = 'right';

\t\tphpbb.registerDropdown(\$trigger, \$contents, options);
\t});
\t";
        }
        // line 164
        echo "});
</script>

";
        // line 167
        if (((($context["S_VIDEOBG"] ?? null) && (($context["S_INDEX"] ?? null) || ($context["S_VIDEOBG_ALL"] ?? null))) &&  !($context["S_IS_BOT"] ?? null))) {
            $location = "videobg.html";
            $namespace = false;
            if (strpos($location, '@') === 0) {
                $namespace = substr($location, 1, strpos($location, '/') - 1);
                $previous_look_up_order = $this->env->getNamespaceLookUpOrder();
                $this->env->setNamespaceLookUpOrder(array($namespace, '__main__'));
            }
            $this->loadTemplate("videobg.html", "overall_footer.html", 167)->display($context);
            if ($namespace) {
                $this->env->setNamespaceLookUpOrder($previous_look_up_order);
            }
        }
        // line 168
        echo "
";
        // line 169
        if (($context["S_COOKIE_NOTICE"] ?? null)) {
            // line 170
            echo "\t<script src=\"";
            echo ($context["T_ASSETS_PATH"] ?? null);
            echo "/cookieconsent/cookieconsent.min.js?assets_version=";
            echo ($context["T_ASSETS_VERSION"] ?? null);
            echo "\"></script>
\t<script>
\t\twindow.addEventListener(\"load\", function(){
\t\t\twindow.cookieconsent.initialise({
\t\t\t\t\"palette\": {
\t\t\t\t\t\"popup\": {
\t\t\t\t\t\t\"background\": \"#0F538A\"
\t\t\t\t\t},
\t\t\t\t\t\"button\": {
\t\t\t\t\t\t\"background\": \"#E5E5E5\"
\t\t\t\t\t}
\t\t\t\t},
\t\t\t\t\"theme\": \"classic\",
\t\t\t\t\"content\": {
\t\t\t\t\t\"message\": \"";
            // line 184
            echo twig_escape_filter($this->env, $this->env->getExtension('phpbb\template\twig\extension')->lang("COOKIE_CONSENT_MSG"), "js");
            echo "\",
\t\t\t\t\t\"dismiss\": \"";
            // line 185
            echo twig_escape_filter($this->env, $this->env->getExtension('phpbb\template\twig\extension')->lang("COOKIE_CONSENT_OK"), "js");
            echo "\",
\t\t\t\t\t\"link\": \"";
            // line 186
            echo twig_escape_filter($this->env, $this->env->getExtension('phpbb\template\twig\extension')->lang("COOKIE_CONSENT_INFO"), "js");
            echo "\",
\t\t\t\t\t\"href\": \"";
            // line 187
            echo twig_escape_filter($this->env, $this->env->getExtension('phpbb\template\twig\extension')->lang("COOKIE_CONSENT_HREF"), "js");
            echo "\"
\t\t\t\t}
\t\t\t})});
\t</script>
";
        }
        // line 192
        echo "
";
        // line 193
        $previous_look_up_order = $this->env->getNamespaceLookUpOrder();
        $this->env->setNamespaceLookUpOrder(array('phpbbmodders_banhammer', '__main__'));
        $this->env->loadTemplate('@phpbbmodders_banhammer/event/overall_footer_after.html')->display($context);
        $this->env->setNamespaceLookUpOrder($previous_look_up_order);
        // line 194
        echo "
";
        // line 195
        if (($context["S_PLUPLOAD"] ?? null)) {
            $location = "plupload.html";
            $namespace = false;
            if (strpos($location, '@') === 0) {
                $namespace = substr($location, 1, strpos($location, '/') - 1);
                $previous_look_up_order = $this->env->getNamespaceLookUpOrder();
                $this->env->setNamespaceLookUpOrder(array($namespace, '__main__'));
            }
            $this->loadTemplate("plupload.html", "overall_footer.html", 195)->display($context);
            if ($namespace) {
                $this->env->setNamespaceLookUpOrder($previous_look_up_order);
            }
        }
        // line 196
        echo $this->getAttribute(($context["definition"] ?? null), "SCRIPTS", array());
        echo "

";
        // line 198
        // line 199
        echo "
</body>
</html>
";
    }

    public function getTemplateName()
    {
        return "overall_footer.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  407 => 199,  406 => 198,  401 => 196,  387 => 195,  384 => 194,  379 => 193,  376 => 192,  368 => 187,  364 => 186,  360 => 185,  356 => 184,  336 => 170,  334 => 169,  331 => 168,  317 => 167,  312 => 164,  277 => 131,  275 => 130,  202 => 59,  191 => 58,  180 => 57,  170 => 50,  163 => 45,  161 => 44,  150 => 43,  139 => 42,  132 => 41,  124 => 40,  120 => 39,  116 => 37,  112 => 36,  93 => 22,  78 => 18,  74 => 16,  65 => 15,  59 => 14,  57 => 13,  52 => 12,  47 => 11,  46 => 10,  42 => 8,  30 => 7,  26 => 5,  25 => 4,  21 => 2,  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "overall_footer.html", "");
    }
}
