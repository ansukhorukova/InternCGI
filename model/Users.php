<?php

namespace model;

use modules\users\controller\CreateUsers;
use modules\users\controller\DeleteUser;
use modules\users\controller\GetSingleUser;
use modules\users\controller\GetCollectionUsers;

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
    
    public function create(array $user)
    {
        $createUsers = new CreateUsers();
        $createUsers->create($user, $this->dbh);
        unset($createUsers);
    }

    public function getCollection()
    {
        $getCollectionUsers = new GetCollectionUsers();
        $getCollectionUsers->getCollectionItems($this->dbh);
        unset($getCollectionUsers);
    }

    public function getSingleton($user)
    {
        $getSingleUser = new GetSingleUser();
        $getSingleUser->getSingleItem($user, $this->dbh);
        unset($getSingleUser);
    }

    public function delete(array $user)
    {
        $delete = new DeleteUser();
        $delete->delete($user, $this->dbh);
        unset($delete);
    }
}