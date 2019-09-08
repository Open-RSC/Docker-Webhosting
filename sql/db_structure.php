<?php

/* vim: set expandtab sw=4 ts=4 sts=4: */
/**
 * Database structure manipulation.
 */
use PhpMyAdmin\Util;
use PhpMyAdmin\Response;
use PhpMyAdmin\Di\Container;
use PhpMyAdmin\Controllers\Database\DatabaseStructureController;

require_once 'libraries/common.inc.php';
require_once 'libraries/db_common.inc.php';

$container = Container::getDefaultContainer();
$container->factory(
    'PhpMyAdmin\Controllers\Database\DatabaseStructureController'
);
$container->alias(
    'DatabaseStructureController',
    'PhpMyAdmin\Controllers\Database\DatabaseStructureController'
);
$container->set('PhpMyAdmin\Response', Response::getInstance());
$container->alias('response', 'PhpMyAdmin\Response');

/* Define dependencies for the concerned controller */
$dependency_definitions = [
    'db' => $db,
];

/** @var DatabaseStructureController $controller */
$controller = $container->get(
    'DatabaseStructureController',
    $dependency_definitions
);
$controller->indexAction();
