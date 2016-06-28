<?php

namespace modules\users\controller;

use modules\users\core\abstracts\DeleteUsersAbstract;

class DeleteUser extends DeleteUsersAbstract
{
    protected $dbh = null;

    protected function _deleteUsers($deleteUser, $dbh)
    {
        $this->dbh = $dbh;
        if($deleteUser['id'] != null) {
            $this->request('id', $deleteUser['id']);
        } elseif ($deleteUser['email'] != null) {
            $this->request('email', $deleteUser['id']);
        }
    }

    protected function request($searchType, $searchValue)
    {
        $this->dbh->query("DELETE FROM `users` WHERE $searchType = $searchValue");
    }
}