<?php

namespace controllers\users;

use core\abstracts\items\DeleteItemsAbstract;

class DeleteUser extends DeleteItemsAbstract
{
    protected $dbh = null;

    protected function _deleteItem($deleteUser, $dbh)
    {
        $this->dbh = $dbh;
        if($deleteUser['id'] != null) {
            if(filter_var($deleteUser['id'], FILTER_VALIDATE_INT) === 0 ||
                !filter_var($deleteUser['id'], FILTER_VALIDATE_INT) === false){
                $this->request('id', $deleteUser['id']);
            }
        } elseif ($deleteUser['email'] != null) {
            if(!filter_var($deleteUser['email'], FILTER_VALIDATE_EMAIL) === false) {
                $this->request('email', $deleteUser['email']);
            }
        }
    }

    protected function request($searchType, $searchValue)
    {
        $this->dbh->query("DELETE FROM `users` WHERE `" . $searchType .  "` = '" . $searchValue . "'");
    }
}