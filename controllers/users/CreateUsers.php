<?php

namespace controllers\users;

use controllers\logger\LoggerInDB;
use core\abstracts\items\CreateItemsAbstract;
use \controllers\logger\LoggerInFileSystem;
use \PDO;

class CreateUsers extends CreateItemsAbstract
{
    private $message = 'New user created';
    private $dbh;
    public function createItem($newUser, $dbh)
    {
        
    }

}