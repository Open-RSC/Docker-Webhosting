<?php

/* vim: set expandtab sw=4 ts=4 sts=4: */
/**
 * Page preferences form.
 */

namespace PhpMyAdmin\Config\Forms\Page;

use PhpMyAdmin\Config\Forms\BaseFormList;

class PageFormList extends BaseFormList
{
    protected static $all = [
        'Browse',
        'DbStructure',
        'Edit',
        'Export',
        'Import',
        'Navi',
        'Sql',
        'TableStructure',
    ];

    protected static $ns = '\\PhpMyAdmin\\Config\\Forms\\Page\\';
}
