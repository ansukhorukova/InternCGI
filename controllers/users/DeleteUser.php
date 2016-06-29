<?php

namespace controllers\users;

use core\abstracts\items\DeleteItemsAbstract;

class DeleteUser extends DeleteItemsAbstract
{
    protected $dbh = null;

    protected function _deleteItem($deleteUser, $dbh)
    {
        
    }
}