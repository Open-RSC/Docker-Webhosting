<?php

/* vim: set expandtab sw=4 ts=4 sts=4: */
/**
 * Handles server binary log page.
 */
use PhpMyAdmin\Response;
use PhpMyAdmin\Di\Container;
use PhpMyAdmin\Controllers\Server\ServerCollationsController;

require_once 'libraries/common.inc.php';

$container = Container::getDefaultContainer();
$container->factory(
    'PhpMyAdmin\Controllers\Server\ServerBinlogController'
);
$container->alias(
    'ServerBinlogController',
    'PhpMyAdmin\Controllers\Server\ServerBinlogController'
);
$container->set('PhpMyAdmin\Response', Response::getInstance());
$container->alias('response', 'PhpMyAdmin\Response');

/** @var ServerBinlogController $controller */
$controller = $container->get(
    'ServerBinlogController', []
);
$controller->indexAction();
