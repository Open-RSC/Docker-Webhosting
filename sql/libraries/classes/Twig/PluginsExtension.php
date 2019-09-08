<?php

/* vim: set expandtab sw=4 ts=4 sts=4: */
/**
 * hold PhpMyAdmin\Twig\PluginsExtension class.
 */

namespace PhpMyAdmin\Twig;

use Twig\TwigFunction;
use Twig\Extension\AbstractExtension;

/**
 * Class PluginsExtension.
 */
class PluginsExtension extends AbstractExtension
{
    /**
     * Returns a list of functions to add to the existing list.
     *
     * @return TwigFunction[]
     */
    public function getFunctions()
    {
        return [
            new TwigFunction(
                'Plugins_checkboxCheck',
                'PhpMyAdmin\Plugins::checkboxCheck',
                ['is_safe' => ['html']]
            ),
            new TwigFunction(
                'Plugins_getChoice',
                'PhpMyAdmin\Plugins::getChoice',
                ['is_safe' => ['html']]
            ),
            new TwigFunction(
                'Plugins_getDefault',
                'PhpMyAdmin\Plugins::getDefault',
                ['is_safe' => ['html']]
            ),
            new TwigFunction(
                'Plugins_getOptions',
                'PhpMyAdmin\Plugins::getOptions',
                ['is_safe' => ['html']]
            ),
        ];
    }
}
