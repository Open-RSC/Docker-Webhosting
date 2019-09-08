<?php

/* vim: set expandtab sw=4 ts=4 sts=4: */
/**
 * Setup preferences form.
 */

namespace PhpMyAdmin\Config\Forms\Setup;

use PhpMyAdmin\Config\Forms\BaseFormList;

class SetupFormList extends BaseFormList
{
    protected static $all = [
        'Config',
        'Export',
        'Features',
        'Import',
        'Main',
        'Navi',
        'Servers',
        'Sql',
    ];

    protected static $ns = '\\PhpMyAdmin\\Config\\Forms\\Setup\\';
}
