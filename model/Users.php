<?php

namespace model;

use modules\users\controller\CreateUsers;
use modules\users\controller\DeleteUser;
use modules\users\controller\GetCollectionUsers;
use modules\users\controller\GetSingleUser;

class Users 
{
    protected $dbh = null;

    public function __construct ()
    {
        $this->dbh = ConnectToDataBase::connectToPdo();
    }

    public function __destruct()
    {
        unset($this->dbh);
    }
    
    public function register(array $user)
    {
        $createUsers = new CreateUsers();
        $createUsers->registerNewUser($user, $this->dbh);
        unset($createUsers);
    }

    public function getCollection()
    {
        $getCollectionUsers = new GetCollectionUsers();
        $getCollectionUsers->getCollectionUsers($this->dbh);
        unset($getCollectionUsers);
    }

    public function getSingleton($user)
    {
        $getSingleUser = new GetSingleUser();
        $getSingleUser->getSingleUser($user, $this->dbh);
        unset($getSingleUser);
    }

    public function delete(array $user)
    {
        $delete = new DeleteUser();
        $delete->delete($user, $this->dbh);
        unset($delete);
    }
}