<?php

/* vim: set expandtab sw=4 ts=4 sts=4: */
/**
 * User preferences form.
 */

namespace PhpMyAdmin\Config\Forms\User;

use PhpMyAdmin\Config\Forms\BaseFormList;

class UserFormList extends BaseFormList
{
    protected static $all = [
        'Features',
        'Sql',
        'Navi',
        'Main',
        'Import',
        'Export',
    ];

    protected static $ns = '\\PhpMyAdmin\\Config\\Forms\\User\\';
}
