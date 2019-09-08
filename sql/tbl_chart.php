<?php

/* vim: set expandtab sw=4 ts=4 sts=4: */
/**
 * handles creation of the chart.
 */
use PhpMyAdmin\Response;
use PhpMyAdmin\Di\Container;
use PhpMyAdmin\Controllers\Table\TableChartController;

require_once 'libraries/common.inc.php';

$container = Container::getDefaultContainer();
$container->factory('PhpMyAdmin\Controllers\Table\TableChartController');
$container->alias(
    'TableChartController', 'PhpMyAdmin\Controllers\Table\TableChartController'
);
$container->set('PhpMyAdmin\Response', Response::getInstance());
$container->alias('response', 'PhpMyAdmin\Response');

/* Define dependencies for the concerned controller */
$dependency_definitions = [
    'sql_query' => &$GLOBALS['sql_query'],
    'url_query' => &$GLOBALS['url_query'],
    'cfg' => &$GLOBALS['cfg'],
];

/** @var TableChartController $controller */
$controller = $container->get('TableChartController', $dependency_definitions);
$controller->indexAction();
