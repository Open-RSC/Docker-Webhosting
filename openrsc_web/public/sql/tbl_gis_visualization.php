<?php

/* vim: set expandtab sw=4 ts=4 sts=4: */
/**
 * handles creation of the GIS visualizations.
 */
use PhpMyAdmin\Util;
use PhpMyAdmin\Response;
use PhpMyAdmin\Di\Container;
use PhpMyAdmin\Controllers\Table\TableGisVisualizationController;

require_once 'libraries/common.inc.php';

$container = Container::getDefaultContainer();
$container->factory(
    'PhpMyAdmin\Controllers\Table\TableGisVisualizationController'
);
$container->alias(
    'TableGisVisualizationController',
    'PhpMyAdmin\Controllers\Table\TableGisVisualizationController'
);
$container->set('PhpMyAdmin\Response', Response::getInstance());
$container->alias('response', 'PhpMyAdmin\Response');

/* Define dependencies for the concerned controller */
$dependency_definitions = [
    'sql_query' => &$GLOBALS['sql_query'],
    'url_params' => &$GLOBALS['url_params'],
    'goto' => Util::getScriptNameForOption(
        $GLOBALS['cfg']['DefaultTabDatabase'], 'database'
    ),
    'back' => 'sql.php',
    'visualizationSettings' => [],
];

/** @var TableGisVisualizationController $controller */
$controller = $container->get(
    'TableGisVisualizationController', $dependency_definitions
);
$controller->indexAction();
