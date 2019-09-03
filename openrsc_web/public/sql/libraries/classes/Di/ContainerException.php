<?php

/* vim: set expandtab sw=4 ts=4 sts=4: */
/**
 * Holds the PhpMyAdmin\Di\ContainerException class.
 */

namespace PhpMyAdmin\Di;

use Exception;
use Psr\Container\ContainerExceptionInterface;

/**
 * Class ContainerException.
 */
class ContainerException extends Exception implements ContainerExceptionInterface
{
}
