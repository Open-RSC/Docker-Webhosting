<?php

/* vim: set expandtab sw=4 ts=4 sts=4: */
/**
 * Holds the PhpMyAdmin\Di\ServiceItem class.
 */

namespace PhpMyAdmin\Di;

/**
 * Service manager.
 */
class ServiceItem extends ReflectorItem
{
    /** @var mixed */
    protected $instance;

    /**
     * Get the instance of the service.
     *
     * @param array $params Parameters
     * @return mixed
     */
    public function get(array $params = [])
    {
        if (! isset($this->instance)) {
            $this->instance = $this->invoke();
        }

        return $this->instance;
    }
}
