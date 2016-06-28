<?php

namespace modules\users\core\abstracts;

use modules\users\core\interfaces\CreateUsersInterface;

abstract class CreateUsersAbstract implements CreateUsersInterface
{
    public function delete(array $newUser)
    {
        $this->_deleteUsers($newUser);
    }

    abstract protected function _deleteUsers(array $newUser);
}