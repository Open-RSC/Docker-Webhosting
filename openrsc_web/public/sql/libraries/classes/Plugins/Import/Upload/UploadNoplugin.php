<?php

/* vim: set expandtab sw=4 ts=4 sts=4: */
/**
 * Provides upload functionalities for the import plugins.
 */

namespace PhpMyAdmin\Plugins\Import\Upload;

use PhpMyAdmin\Plugins\UploadInterface;

/**
 * Implementation for no plugin.
 */
class UploadNoplugin implements UploadInterface
{
    /**
     * Gets the specific upload ID Key.
     *
     * @return string ID Key
     */
    public static function getIdKey()
    {
        return 'noplugin';
    }

    /**
     * Returns upload status.
     *
     * This is implementation when no webserver support exists,
     * so it returns just zeroes.
     *
     * @param string $id upload id
     *
     * @return array|null
     */
    public static function getUploadStatus($id)
    {
        global $SESSION_KEY;

        if (trim($id) == '') {
            return;
        }
        if (! array_key_exists($id, $_SESSION[$SESSION_KEY])) {
            $_SESSION[$SESSION_KEY][$id] = [
                'id'       => $id,
                'finished' => false,
                'percent'  => 0,
                'total'    => 0,
                'complete' => 0,
                'plugin'   => self::getIdKey(),
            ];
        }
        $ret = $_SESSION[$SESSION_KEY][$id];

        return $ret;
    }
}
