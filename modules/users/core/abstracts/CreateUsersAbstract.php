<?php

namespace modules\users\core\abstracts;

abstract class CreateUsersAbstract 
{
    public function registerNewUser(array $newUser, $dbh)
    {
        $this->_createUser($newUser, $dbh);
    }

    abstract protected function _createUser($newUser, $dbh);
}