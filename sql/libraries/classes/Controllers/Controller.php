<?php

/* vim: set expandtab sw=4 ts=4 sts=4: */
/**
 * Holds the PhpMyAdmin\Controllers\Controller.
 */

namespace PhpMyAdmin\Controllers;

use PhpMyAdmin\Response;
use PhpMyAdmin\DatabaseInterface;

/**
 * Base class for all of controller.
 */
abstract class Controller
{
    /**
     * @var Response
     */
    protected $response;

    /**
     * @var DatabaseInterface
     */
    protected $dbi;

    /**
     * Constructor.
     */
    public function __construct($response, $dbi)
    {
        $this->response = $response;
        $this->dbi = $dbi;
    }
}
