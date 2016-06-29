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
    protected function _createItem($newUser, $dbh)
    {
        $this->dbh = $dbh;
        try{
            $statement = $this->dbh->prepare("
                                 INSERT INTO `users` (`firstname`, `lastname`, `type`, 
                                                      `login`, `password`, `email`, 
                                                      `creation_date`)
                                 VALUES (?, ?, ?, ?, ?, ?, ?)");
            $statement->bindParam(1, $newUser['firstname'], PDO::PARAM_STR);
            $statement->bindParam(2, $newUser['lastname'], PDO::PARAM_STR);
            $statement->bindParam(3, $newUser['type'], PDO::PARAM_STR);
            $statement->bindParam(4, $newUser['login'], PDO::PARAM_STR);
            $statement->bindParam(5, $newUser['password'], PDO::PARAM_STR);
            $statement->bindParam(6, $newUser['email'], PDO::PARAM_STR);
            $date = date('Y-m-d H:i:s');
            $statement->bindParam(7, $date);
            $statement->execute();

            $this->logger($this->message);

        } catch (Exception $e) {
            $this->logger($e->getMessage());
        }
    }

    private function logger($message){
        $loggerInFile = new LoggerInFileSystem();
        $loggerInFile->notice($message);
        $loggerInDB = new LoggerInDB($this->dbh);
        $loggerInDB->notice($message);
    }
}