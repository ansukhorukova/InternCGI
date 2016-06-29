<?php

namespace models;

use controllers\users\CreateUsers;
use controllers\users\DeleteUser;
use controllers\users\GetSingleUser;
use controllers\users\GetCollectionUsers;

class Users 
{
    private $dbh;
    private $data = array();

    /**
     * Users constructor. Make connection to DB
     */
    public function __construct ($dbh)
    {
        $this->dbh = $dbh;
    }

    /**
     * Users destructor. Close connection to DB
     */
    public function __destruct()
    {
        unset($this->dbh);
    }

    public function __set($name, $value)
    {
        $this->data[$name] = $value;
    }

    public function __get($name)
    {
        return $this->data[$name];
    }

    /**
     * Call create() function, it'll create new user in DB.
     *
     * @param array $user. Send array with user data, like name, login, password and etc.
     */
    public function save()
    {
        $createUsers = new CreateUsers();
        $createUsers->create($this->data, $this->dbh);
        unset($createUsers);
    }

    /**
     * Call getCollectionItems() method, and receive collection users from 'user' table.
     */
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