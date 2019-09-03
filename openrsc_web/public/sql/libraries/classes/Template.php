<?php

/* vim: set expandtab sw=4 ts=4 sts=4: */
/**
 * hold PhpMyAdmin\Template class.
 */

namespace PhpMyAdmin;

use Twig\Environment;
use PhpMyAdmin\Twig\UrlExtension;
use Twig\Loader\FilesystemLoader;
use PhpMyAdmin\Twig\CoreExtension;
use PhpMyAdmin\Twig\I18nExtension;
use PhpMyAdmin\Twig\UtilExtension;
use PhpMyAdmin\Twig\IndexExtension;
use PhpMyAdmin\Twig\TableExtension;
use PhpMyAdmin\Twig\MessageExtension;
use PhpMyAdmin\Twig\PluginsExtension;
use PhpMyAdmin\Twig\TrackerExtension;
use PhpMyAdmin\Twig\CharsetsExtension;
use PhpMyAdmin\Twig\RelationExtension;
use PhpMyAdmin\Twig\SanitizeExtension;
use PhpMyAdmin\Twig\PartitionExtension;
use PhpMyAdmin\Twig\PhpFunctionsExtension;
use PhpMyAdmin\Twig\StorageEngineExtension;
use PhpMyAdmin\Twig\TransformationsExtension;
use PhpMyAdmin\Twig\ServerPrivilegesExtension;

/**
 * Class Template.
 *
 * Handle front end templating
 */
class Template
{
    /**
     * Name of the template.
     */
    protected $name = null;

    /**
     * Twig environment.
     */
    protected static $twig;

    const BASE_PATH = 'templates/';

    /**
     * Template constructor.
     *
     * @param string $name Template name
     */
    protected function __construct($name)
    {
        $this->name = $name;

        if (is_null($this::$twig)) {
            $loader = new FilesystemLoader(static::BASE_PATH);
            $cache_dir = $GLOBALS['PMA_Config']->getTempDir('twig');
            /* Twig expects false when cache is not configured */
            if (is_null($cache_dir)) {
                $cache_dir = false;
            }
            $twig = new Environment($loader, [
                'auto_reload' => true,
                'cache' => $cache_dir,
                'debug' => false,
            ]);
            $twig->addExtension(new CharsetsExtension());
            $twig->addExtension(new CoreExtension());
            $twig->addExtension(new I18nExtension());
            $twig->addExtension(new IndexExtension());
            $twig->addExtension(new MessageExtension());
            $twig->addExtension(new PartitionExtension());
            $twig->addExtension(new PhpFunctionsExtension());
            $twig->addExtension(new PluginsExtension());
            $twig->addExtension(new RelationExtension());
            $twig->addExtension(new SanitizeExtension());
            $twig->addExtension(new ServerPrivilegesExtension());
            $twig->addExtension(new StorageEngineExtension());
            $twig->addExtension(new TrackerExtension());
            $twig->addExtension(new TableExtension());
            $twig->addExtension(new TransformationsExtension());
            $twig->addExtension(new UrlExtension());
            $twig->addExtension(new UtilExtension());
            $this::$twig = $twig;
        }
    }

    /**
     * Template getter.
     *
     * @param string $name Template name
     *
     * @return Template
     */
    public static function get($name)
    {
        return new self($name);
    }

    /**
     * Render template.
     *
     * @param array $data Variables to be provided to the template
     *
     * @return string
     */
    public function render(array $data = [])
    {
        try {
            $template = $this::$twig->load($this->name.'.twig');
        } catch (\RuntimeException $e) {
            /* Retry with disabled cache */
            $this::$twig->setCache(false);
            $template = $this::$twig->load($this->name.'.twig');
            /*
             * The trigger error is intentionally after second load
             * to avoid triggering error when disabling cache does not
             * solve it.
             */
            trigger_error(
                sprintf(
                    __('Error while working with template cache: %s'),
                    $e->getMessage()
                ),
                E_USER_WARNING
            );
        }

        return $template->render($data);
    }
}
