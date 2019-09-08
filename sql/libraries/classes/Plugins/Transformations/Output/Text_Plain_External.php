<?php

/* vim: set expandtab sw=4 ts=4 sts=4: */
/**
 * Text Plain External Transformations plugin for phpMyAdmin.
 */

namespace PhpMyAdmin\Plugins\Transformations\Output;

use PhpMyAdmin\Plugins\Transformations\Abs\ExternalTransformationsPlugin;

/**
 * Handles the external transformation for text plain.
 */
// @codingStandardsIgnoreLine
class Text_Plain_External extends ExternalTransformationsPlugin
{
    /**
     * Gets the plugin`s MIME type.
     *
     * @return string
     */
    public static function getMIMEType()
    {
        return 'Text';
    }

    /**
     * Gets the plugin`s MIME subtype.
     *
     * @return string
     */
    public static function getMIMESubtype()
    {
        return 'Plain';
    }
}
