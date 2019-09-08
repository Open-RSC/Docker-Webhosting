<?php

/* vim: set expandtab sw=4 ts=4 sts=4: */
/**
 * hold PhpMyAdmin\Twig\StorageEngineExtension class.
 */

namespace PhpMyAdmin\Twig;

use Twig\TwigFunction;
use Twig\Extension\AbstractExtension;

/**
 * Class StorageEngineExtension.
 */
class StorageEngineExtension extends AbstractExtension
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
                'StorageEngine_getHtmlSelect',
                'PhpMyAdmin\StorageEngine::getHtmlSelect',
                ['is_safe' => ['html']]
            ),
        ];
    }
}
