<?php

/* vim: set expandtab sw=4 ts=4 sts=4: */
/**
 * User preferences form.
 */

namespace PhpMyAdmin\Config\Forms\User;

use PhpMyAdmin\Config\Forms\BaseForm;

class SqlForm extends BaseForm
{
    public static function getForms()
    {
        return [
            'Sql_queries' => [
                'ShowSQL',
                'Confirm',
                'QueryHistoryMax',
                'IgnoreMultiSubmitErrors',
                'MaxCharactersInDisplayedSQL',
                'RetainQueryBox',
                'CodemirrorEnable',
                'LintEnable',
                'EnableAutocompleteForTablesAndColumns',
                'DefaultForeignKeyChecks',
            ],
            'Sql_box' => [
                'SQLQuery/Edit',
                'SQLQuery/Explain',
                'SQLQuery/ShowAsPHP',
                'SQLQuery/Refresh',
            ],
        ];
    }

    public static function getName()
    {
        return __('SQL queries');
    }
}
