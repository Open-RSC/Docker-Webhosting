<?php

/* vim: set expandtab sw=4 ts=4 sts=4: */
/**
 * hold PhpMyAdmin\Twig\CharsetsExtension class.
 */

namespace PhpMyAdmin\Twig;

use Twig\TwigFunction;
use Twig\Extension\AbstractExtension;

/**
 * Class CharsetsExtension.
 */
class CharsetsExtension extends AbstractExtension
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
                'Charsets_getCollationDescr',
                'PhpMyAdmin\Charsets::getCollationDescr'
            ),
            new TwigFunction(
                'Charsets_getCharsetDropdownBox',
                'PhpMyAdmin\Charsets::getCharsetDropdownBox',
                ['is_safe' => ['html']]
            ),
            new TwigFunction(
                'Charsets_getCollationDropdownBox',
                'PhpMyAdmin\Charsets::getCollationDropdownBox',
                ['is_safe' => ['html']]
            ),
        ];
    }
}
