<?php

/* vim: set expandtab sw=4 ts=4 sts=4: */
/**
 * hold Theme class.
 */

namespace PhpMyAdmin;

use PhpMyAdmin\Url;
use PhpMyAdmin\Template;
use PhpMyAdmin\ThemeManager;

/**
 * handles theme.
 *
 * @todo add the possibility to make a theme depend on another theme
 * and by default on original
 * @todo make all components optional - get missing components from 'parent' theme
 */
class Theme
{
    /**
     * @var string theme version
     */
    public $version = '0.0.0.0';

    /**
     * @var string theme name
     */
    public $name = '';

    /**
     * @var string theme id
     */
    public $id = '';

    /**
     * @var string theme path
     */
    public $path = '';

    /**
     * @var string image path
     */
    public $img_path = '';

    /**
     * @var int last modification time for info file
     */
    public $mtime_info = 0;

    /**
     * needed because sometimes, the mtime for different themes
     * is identical.
     * @var int filesize for info file
     */
    public $filesize_info = 0;

    /**
     * @var array List of css files to load
     */
    private $_cssFiles = [
        'common',
        'enum_editor',
        'gis',
        'navigation',
        'designer',
        'rte',
        'codemirror',
        'jqplot',
        'resizable-menu',
        'icons',
    ];

    /**
     * Loads theme information.
     *
     * @return bool whether loading them info was successful or not
     */
    public function loadInfo()
    {
        $infofile = $this->getPath().'/theme.json';
        if (! @file_exists($infofile)) {
            return false;
        }

        if ($this->mtime_info === filemtime($infofile)) {
            return true;
        }
        $content = @file_get_contents($infofile);
        if ($content === false) {
            return false;
        }
        $data = json_decode($content, true);

        // Did we get expected data?
        if (! is_array($data)) {
            return false;
        }
        // Check that all required data are there
        $members = ['name', 'version', 'supports'];
        foreach ($members as $member) {
            if (! isset($data[$member])) {
                return false;
            }
        }

        // Version check
        if (! is_array($data['supports'])) {
            return false;
        }
        if (! in_array(PMA_MAJOR_VERSION, $data['supports'])) {
            return false;
        }

        $this->mtime_info = filemtime($infofile);
        $this->filesize_info = filesize($infofile);

        $this->setVersion($data['version']);
        $this->setName($data['name']);

        return true;
    }

    /**
     * returns theme object loaded from given folder
     * or false if theme is invalid.
     *
     * @param string $folder path to theme
     *
     * @return Theme|false
     * @static
     */
    public static function load($folder)
    {
        $theme = new self();

        $theme->setPath($folder);

        if (! $theme->loadInfo()) {
            return false;
        }

        $theme->checkImgPath();

        return $theme;
    }

    /**
     * checks image path for existence - if not found use img from fallback theme.
     *
     * @return bool
     */
    public function checkImgPath()
    {
        // try current theme first
        if (is_dir($this->getPath().'/img/')) {
            $this->setImgPath($this->getPath().'/img/');

            return true;
        }

        // try fallback theme
        $fallback = './themes/'.ThemeManager::FALLBACK_THEME.'/img/';
        if (is_dir($fallback)) {
            $this->setImgPath($fallback);

            return true;
        }

        // we failed
        trigger_error(
            sprintf(
                __('No valid image path for theme %s found!'),
                $this->getName()
            ),
            E_USER_ERROR
        );

        return false;
    }

    /**
     * returns path to theme.
     *
     * @return string path to theme
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * returns layout file.
     *
     * @return string layout file
     */
    public function getLayoutFile()
    {
        return $this->getPath().'/layout.inc.php';
    }

    /**
     * set path to theme.
     *
     * @param string $path path to theme
     *
     * @return void
     */
    public function setPath($path)
    {
        $this->path = trim($path);
    }

    /**
     * sets version.
     *
     * @param string $version version to set
     *
     * @return void
     */
    public function setVersion($version)
    {
        $this->version = trim($version);
    }

    /**
     * returns version.
     *
     * @return string version
     */
    public function getVersion()
    {
        return $this->version;
    }

    /**
     * checks theme version against $version
     * returns true if theme version is equal or higher to $version.
     *
     * @param string $version version to compare to
     *
     * @return bool true if theme version is equal or higher to $version
     */
    public function checkVersion($version)
    {
        return version_compare($this->getVersion(), $version, 'lt');
    }

    /**
     * sets name.
     *
     * @param string $name name to set
     *
     * @return void
     */
    public function setName($name)
    {
        $this->name = trim($name);
    }

    /**
     * returns name.
     *
     * @return string name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * sets id.
     *
     * @param string $id new id
     *
     * @return void
     */
    public function setId($id)
    {
        $this->id = trim($id);
    }

    /**
     * returns id.
     *
     * @return string id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Sets path to images for the theme.
     *
     * @param string $path path to images for this theme
     *
     * @return void
     */
    public function setImgPath($path)
    {
        $this->img_path = $path;
    }

    /**
     * Returns the path to image for the theme.
     * If filename is given, it possibly fallbacks to fallback
     * theme for it if image does not exist.
     *
     * @param string $file     file name for image
     * @param string $fallback fallback image
     *
     * @return string image path for this theme
     */
    public function getImgPath($file = null, $fallback = null)
    {
        if (is_null($file)) {
            return $this->img_path;
        }

        if (is_readable($this->img_path.$file)) {
            return $this->img_path.$file;
        }

        if (! is_null($fallback)) {
            return $this->getImgPath($fallback);
        }

        return './themes/'.ThemeManager::FALLBACK_THEME.'/img/'.$file;
    }

    /**
     * load css (send to stdout, normally the browser).
     *
     * @return bool
     */
    public function loadCss()
    {
        $success = true;

        /* Variables to be used by the themes: */
        $theme = $this;
        if ($GLOBALS['text_dir'] === 'ltr') {
            $right = 'right';
            $left = 'left';
        } else {
            $right = 'left';
            $left = 'right';
        }

        foreach ($this->_cssFiles as $file) {
            $path = $this->getPath()."/css/$file.css.php";
            $fallback = './themes/'
                .ThemeManager::FALLBACK_THEME."/css/$file.css.php";

            if (is_readable($path)) {
                echo "\n/* FILE: " , $file , ".css.php */\n";
                include $path;
            } elseif (is_readable($fallback)) {
                echo "\n/* FILE: " , $file , ".css.php */\n";
                include $fallback;
            } else {
                $success = false;
            }
        }

        return $success;
    }

    /**
     * Renders the preview for this theme.
     *
     * @return string
     */
    public function getPrintPreview()
    {
        $url_params = ['set_theme' => $this->getId()];
        $screen = null;
        $path = $this->getPath().'/screen.png';
        if (@file_exists($path)) {
            $screen = $path;
        }

        return Template::get('theme_preview')->render([
            'url_params' => $url_params,
            'name' => $this->getName(),
            'version' => $this->getVersion(),
            'id' => $this->getId(),
            'screen' => $screen,
        ]);
    }

    /**
     * Gets currently configured font size.
     *
     * @return string with font size.
     */
    public function getFontSize()
    {
        $fs = $GLOBALS['PMA_Config']->get('FontSize');
        if (! is_null($fs)) {
            return $fs;
        }

        return '82%';
    }

    /**
     * Generates code for CSS gradient using various browser extensions.
     *
     * @param string $start_color Color of gradient start, hex value without #
     * @param string $end_color   Color of gradient end, hex value without #
     *
     * @return string CSS code.
     */
    public function getCssGradient($start_color, $end_color)
    {
        $result = [];
        // Opera 9.5+, IE 9
        $result[] = 'background-image: url(./themes/svg_gradient.php?from='
            .$start_color.'&to='.$end_color.');';
        $result[] = 'background-size: 100% 100%;';
        // Safari 4-5, Chrome 1-9
        $result[] = 'background: '
            .'-webkit-gradient(linear, left top, left bottom, from(#'
            .$start_color.'), to(#'.$end_color.'));';
        // Safari 5.1, Chrome 10+
        $result[] = 'background: -webkit-linear-gradient(top, #'
            .$start_color.', #'.$end_color.');';
        // Firefox 3.6+
        $result[] = 'background: -moz-linear-gradient(top, #'
            .$start_color.', #'.$end_color.');';
        // IE 10
        $result[] = 'background: -ms-linear-gradient(top, #'
            .$start_color.', #'.$end_color.');';
        // Opera 11.10
        $result[] = 'background: -o-linear-gradient(top, #'
            .$start_color.', #'.$end_color.');';

        return implode("\n", $result);
    }
}
