<?php

/* vim: set expandtab sw=4 ts=4 sts=4: */
/**
 * The MEMORY (HEAP) storage engine.
 */

namespace PhpMyAdmin\Engines;

use PhpMyAdmin\StorageEngine;

/**
 * The MEMORY (HEAP) storage engine.
 */
class Memory extends StorageEngine
{
    /**
     * Returns array with variable names dedicated to MEMORY storage engine.
     *
     * @return array   variable names
     */
    public function getVariables()
    {
        return [
            'max_heap_table_size' => [
                'type' => PMA_ENGINE_DETAILS_TYPE_SIZE,
            ],
        ];
    }
}
