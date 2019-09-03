<?php

/* vim: set expandtab sw=4 ts=4 sts=4: */
/**
 * Holds the PhpMyAdmin\Di\NotFoundException class.
 */

namespace PhpMyAdmin\Di;

use Psr\Container\NotFoundExceptionInterface;

/**
 * Class NotFoundException.
 */
class NotFoundException extends ContainerException implements NotFoundExceptionInterface
{
}
