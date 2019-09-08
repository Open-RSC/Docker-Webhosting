<?php

/* vim: set expandtab sw=4 ts=4 sts=4: */
/**
 * Handles server databases page.
 */
use PhpMyAdmin\Response;
use PhpMyAdmin\Di\Container;
use PhpMyAdmin\Controllers\Server\ServerDatabasesController;

require_once 'libraries/common.inc.php';

$container = Container::getDefaultContainer();
$container->factory(
    'PhpMyAdmin\Controllers\Server\ServerDatabasesController'
);
$container->alias(
    'ServerDatabasesController',
    'PhpMyAdmin\Controllers\Server\ServerDatabasesController'
);
$container->set('PhpMyAdmin\Response', Response::getInstance());
$container->alias('response', 'PhpMyAdmin\Response');

/** @var ServerDatabasesController $controller */
$controller = $container->get(
    'ServerDatabasesController', []
);
$controller->indexAction();
