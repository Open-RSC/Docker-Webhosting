<?php

/* vim: set expandtab sw=4 ts=4 sts=4: */
/**
 * User preferences form.
 */

namespace PhpMyAdmin\Config\Forms\Page;

use PhpMyAdmin\Config\Forms\BaseForm;
use PhpMyAdmin\Config\Forms\User\MainForm;

class TableStructureForm extends BaseForm
{
    public static function getForms()
    {
        return [
            'TableStructure' => MainForm::getForms()['TableStructure'],
        ];
    }
}