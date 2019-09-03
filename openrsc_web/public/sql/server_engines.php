<?php

/* vim: set expandtab sw=4 ts=4 sts=4: */
/**
 * Handles server engines page.
 */
use PhpMyAdmin\Response;
use PhpMyAdmin\Di\Container;
use PhpMyAdmin\Controllers\Server\ServerEnginesController;

require_once 'libraries/common.inc.php';

$container = Container::getDefaultContainer();
$container->factory(
    'PhpMyAdmin\Controllers\Server\ServerEnginesController'
);
$container->alias(
    'ServerEnginesController',
    'PhpMyAdmin\Controllers\Server\ServerEnginesController'
);
$container->set('PhpMyAdmin\Response', Response::getInstance());
$container->alias('response', 'PhpMyAdmin\Response');

/** @var ServerEnginesController $controller */
$controller = $container->get(
    'ServerEnginesController', []
);
$controller->indexAction();
