<?php

/* vim: set expandtab sw=4 ts=4 sts=4: */
/**
 * hold PhpMyAdmin\Twig\ServerPrivilegesExtension class.
 */

namespace PhpMyAdmin\Twig;

use Twig\TwigFunction;
use Twig\Extension\AbstractExtension;

/**
 * Class ServerPrivilegesExtension.
 */
class ServerPrivilegesExtension extends AbstractExtension
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
                'ServerPrivileges_formatPrivilege',
                'PhpMyAdmin\Server\Privileges::formatPrivilege',
                ['is_safe' => ['html']]
            ),
        ];
    }
}
