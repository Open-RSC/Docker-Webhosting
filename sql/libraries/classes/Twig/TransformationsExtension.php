<?php

/* vim: set expandtab sw=4 ts=4 sts=4: */
/**
 * hold PhpMyAdmin\Twig\TransformationsExtension class.
 */

namespace PhpMyAdmin\Twig;

use Twig\TwigFunction;
use Twig\Extension\AbstractExtension;

/**
 * Class TransformationsExtension.
 */
class TransformationsExtension extends AbstractExtension
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
                'Transformations_getDescription',
                'PhpMyAdmin\Transformations::getDescription'
            ),
            new TwigFunction(
                'Transformations_getName',
                'PhpMyAdmin\Transformations::getName'
            ),
        ];
    }
}
