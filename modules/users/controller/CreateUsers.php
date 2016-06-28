<?php

namespace modules\users\controller;

use modules\users\core\abstracts\CreateUsersAbstract;

class CreateUsers extends CreateUsersAbstract
{
    protected function _createUser($newUser, $dbh)
    {
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

    }
}