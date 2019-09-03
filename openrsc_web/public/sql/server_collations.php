<?php

/* vim: set expandtab sw=4 ts=4 sts=4: */
/**
 * Handles server charsets and collations page.
 */
use PhpMyAdmin\Response;
use PhpMyAdmin\Di\Container;
use PhpMyAdmin\Controllers\Server\ServerCollationsController;

require_once 'libraries/common.inc.php';

$container = Container::getDefaultContainer();
$container->factory(
    'PhpMyAdmin\Controllers\Server\ServerCollationsController'
);
$container->alias(
    'ServerCollationsController',
    'PhpMyAdmin\Controllers\Server\ServerCollationsController'
);
$container->set('PhpMyAdmin\Response', Response::getInstance());
$container->alias('response', 'PhpMyAdmin\Response');

/** @var ServerCollationsController $controller */
$controller = $container->get(
    'ServerCollationsController', []
);
$controller->indexAction();
