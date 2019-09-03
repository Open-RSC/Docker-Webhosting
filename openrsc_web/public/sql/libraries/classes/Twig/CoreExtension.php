<?php

/* vim: set expandtab sw=4 ts=4 sts=4: */
/**
 * hold PhpMyAdmin\Twig\CoreExtension class.
 */

namespace PhpMyAdmin\Twig;

use Twig\TwigFunction;
use Twig\Extension\AbstractExtension;

/**
 * Class CoreExtension.
 */
class CoreExtension extends AbstractExtension
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
                'Core_mimeDefaultFunction',
                'PhpMyAdmin\Core::mimeDefaultFunction',
                ['is_safe' => ['html']]
            ),
        ];
    }
}
