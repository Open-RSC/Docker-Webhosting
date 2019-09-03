<?php

/* vim: set expandtab sw=4 ts=4 sts=4: */
/**
 * Holds the PhpMyAdmin\Di\FactoryItem class.
 */

namespace PhpMyAdmin\Di;

/**
 * Factory manager.
 */
class FactoryItem extends ReflectorItem
{
    /**
     * Construct an instance.
     *
     * @param array $params Parameters
     *
     * @return mixed
     */
    public function get(array $params = [])
    {
        return $this->invoke($params);
    }
}
