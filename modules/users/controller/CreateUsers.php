<?php

namespace modules\users\controller;

use modules\users\core\abstracts\CreateUsersAbstract;
use modules\logger\controller\LoggerInFileSystem;

class CreateUsers extends CreateUsersAbstract
{
    private $message = 'New user created';
    protected function _createUser($newUser, $dbh)
    {
        try{
            $statement = $dbh->prepare("
                                 INSERT INTO `users` (`firstname`, `lastname`, `type`, 
                                                      `login`, `password`, `email`, 
                                                      `creation_date`)
                                 VALUES (?, ?, ?, ?, ?, ?, ?)");
            $statement->execute([
                $newUser['firstname'], $newUser['lastname'],
                $newUser['type'], $newUser['login'],
                $newUser['password'], $newUser['email'],
                date('Y-m-d H:i:s')
            ]);

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