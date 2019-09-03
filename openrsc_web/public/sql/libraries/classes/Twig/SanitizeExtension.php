<?php

/* vim: set expandtab sw=4 ts=4 sts=4: */
/**
 * hold PhpMyAdmin\Twig\SanitizeExtension class.
 */

namespace PhpMyAdmin\Twig;

use Twig\TwigFunction;
use Twig\Extension\AbstractExtension;

/**
 * Class SanitizeExtension.
 */
class SanitizeExtension extends AbstractExtension
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
                'Sanitize_escapeJsString',
                'PhpMyAdmin\Sanitize::escapeJsString',
                ['is_safe' => ['html']]
            ),
            new TwigFunction(
                'Sanitize_jsFormat',
                'PhpMyAdmin\Sanitize::jsFormat',
                ['is_safe' => ['html']]
            ),
            new TwigFunction(
                'Sanitize_sanitize',
                'PhpMyAdmin\Sanitize::sanitize',
                ['is_safe' => ['html']]
            ),
        ];
    }
}
