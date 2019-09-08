<?php

/* vim: set expandtab sw=4 ts=4 sts=4: */
/**
 * Handles server plugins page.
 */
use PhpMyAdmin\Response;
use PhpMyAdmin\Di\Container;
use PhpMyAdmin\Controllers\Server\ServerPluginsController;

require_once 'libraries/common.inc.php';

$container = Container::getDefaultContainer();
$container->factory(
    'PhpMyAdmin\Controllers\Server\ServerPluginsController'
);
$container->alias(
    'ServerPluginsController',
    'PhpMyAdmin\Controllers\Server\ServerPluginsController'
);
$container->set('PhpMyAdmin\Response', Response::getInstance());
$container->alias('response', 'PhpMyAdmin\Response');

/** @var ServerPluginsController $controller */
$controller = $container->get(
    'ServerPluginsController', []
);
$controller->indexAction();
