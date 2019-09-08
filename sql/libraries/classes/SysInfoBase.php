<?php

/* vim: set expandtab sw=4 ts=4 sts=4: */
/**
 * Hold PhpMyAdmin\SysInfoBase class.
 */

namespace PhpMyAdmin;

/**
 * Basic sysinfo class not providing any real data.
 */
class SysInfoBase
{
    public $os = PHP_OS;

    /**
     * Gets load information.
     *
     * @return array with load data
     */
    public function loadavg()
    {
        return ['loadavg' => 0];
    }

    /**
     * Gets information about memory usage.
     *
     * @return array with memory usage data
     */
    public function memory()
    {
        return [];
    }

    /**
     * Checks whether class is supported in this environment.
     *
     * @return true on success
     */
    public function supported()
    {
        return true;
    }
}
