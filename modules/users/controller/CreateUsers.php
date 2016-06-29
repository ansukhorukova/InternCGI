<?php

namespace modules\users\controller;

use core\abstracts\CreateAbstract;
use modules\logger\controller\LoggerInFileSystem;
use \PDO;

class CreateUsers extends CreateAbstract
{
    private $message = 'New user created';
    protected function _createItem($newUser, $dbh)
    {
        try{
            $statement = $dbh->prepare("
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
        $logger = new LoggerInFileSystem();
        $logger->notice($message);
        unset($logger);
    }
}