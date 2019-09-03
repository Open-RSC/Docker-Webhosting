<?php

/* vim: set expandtab sw=4 ts=4 sts=4: */
/**
 * Functionality for the navigation tree.
 */

namespace PhpMyAdmin\Navigation\Nodes;

use PhpMyAdmin\Util;
use PhpMyAdmin\Navigation\NodeFactory;

require_once './libraries/check_user_privileges.inc.php';

/**
 * Represents a container for database nodes in the navigation tree.
 */
class NodeDatabaseContainer extends Node
{
    /**
     * Initialises the class.
     *
     * @param string $name An identifier for the new node
     */
    public function __construct($name)
    {
        parent::__construct($name, Node::CONTAINER);

        if ($GLOBALS['is_create_db_priv']
            && $GLOBALS['cfg']['ShowCreateDb'] !== false
        ) {
            $new = NodeFactory::getInstance(
                'Node',
                _pgettext('Create new database', 'New')
            );
            $new->isNew = true;
            $new->icon = Util::getImage('b_newdb', '');
            $new->links = [
                'text' => 'server_databases.php?server='.$GLOBALS['server'],
                'icon' => 'server_databases.php?server='.$GLOBALS['server'],
            ];
            $new->classes = 'new_database italics';
            $this->addChild($new);
        }
    }
}
