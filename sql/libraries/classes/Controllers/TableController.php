<?php

/* vim: set expandtab sw=4 ts=4 sts=4: */
/**
 * Holds the PhpMyAdmin\Controllers\TableController.
 */

namespace PhpMyAdmin\Controllers;

/**
 * Handles table related logic.
 */
abstract class TableController extends Controller
{
    /**
     * @var string
     */
    protected $db;

    /**
     * @var string
     */
    protected $table;

    /**
     * Constructor.
     */
    public function __construct(
        $response,
        $dbi,
        $db,
        $table
    ) {
        parent::__construct($response, $dbi);
        $this->db = $db;
        $this->table = $table;
    }
}
