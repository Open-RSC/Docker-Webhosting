<?php

/* vim: set expandtab sw=4 ts=4 sts=4: */
/**
 * hold PhpMyAdmin\Twig\IndexExtension class.
 */

namespace PhpMyAdmin\Twig;

use Twig\TwigFunction;
use Twig\Extension\AbstractExtension;

/**
 * Class IndexExtension.
 */
class IndexExtension extends AbstractExtension
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
                'Index_getHtmlForDisplayIndexes',
                'PhpMyAdmin\Index::getHtmlForDisplayIndexes',
                ['is_safe' => ['html']]
            ),
        ];
    }
}
