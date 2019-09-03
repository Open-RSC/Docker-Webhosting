<?php

/* vim: set expandtab sw=4 ts=4 sts=4: */
/**
 * Server import page.
 */
use PhpMyAdmin\Response;
use PhpMyAdmin\Display\Import;
use PhpMyAdmin\Config\PageSettings;

require_once 'libraries/common.inc.php';

PageSettings::showGroup('Import');

$response = Response::getInstance();
$header = $response->getHeader();
$scripts = $header->getScripts();
$scripts->addFile('import.js');

/**
 * Does the common work.
 */
require 'libraries/server_common.inc.php';

$response = Response::getInstance();
$response->addHTML(
    Import::get(
        'server', $db, $table, $max_upload_size
    )
);
