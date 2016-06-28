<?php

namespace modules\users\core\abstracts;

use modules\users\core\interfaces\GetCollectionUsersInterface;

abstract class GetUsersFromDataBaseAbstract
    implements GetCollectionUsersInterface
{
    public function getSingleUser(array $user, $dbh)
    {
        $this->_showUsers($user, $dbh);
    }

    public function getCollectionUsers($dbh)
    {
       $this->_showUsers(null, $dbh);
    }

   abstract protected function _showUsers($users, $dbh);
}
