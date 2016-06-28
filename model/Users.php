<?php

namespace model;

use modules\users\controller\CreateUsers;
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
        $CreateUsers = new CreateUsers();
        $CreateUsers->registerNewUser($user, $this->dbh);
        unset($CreateUsers);
    }

    public function getCollection()
    {
        $GetCollectionUsers = new GetCollectionUsers();
        $GetCollectionUsers->getCollectionUsers($this->dbh);
        unset($GetCollectionUsers);
    }

    public function getSingle($user)
    {
        $GetSingleUser = new GetSingleUser();
        $GetSingleUser->getSingleUser($user, $this->dbh);
        unset($GetSingleUser);
    }
}