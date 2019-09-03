<?php

/* vim: set expandtab sw=4 ts=4 sts=4: */
/**
 * Holds the PhpMyAdmin\Controllers\DatabaseController.
 */

namespace PhpMyAdmin\Controllers;

/**
 * Handles database related logic.
 */
abstract class DatabaseController extends Controller
{
    /**
     * @var string
     */
    protected $db;

    /**
     * Constructor.
     */
    public function __construct($response, $dbi, $db)
    {
        parent::__construct($response, $dbi);
        $this->db = $db;
    }
}
