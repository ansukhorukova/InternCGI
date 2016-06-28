<?php

namespace modules\users\core\abstracts;

abstract class DeleteUsersAbstract
{
    public function delete(array $deleteUser, $dbh)
    {
        $this->_deleteUsers($deleteUser, $dbh);
    }

    abstract protected function _deleteUsers($deleteUser, $dbh);
}