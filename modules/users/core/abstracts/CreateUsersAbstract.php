<?php

namespace modules\users\core\abstracts;

use modules\users\core\interfaces\CreateUsersInterface;

abstract class CreateUsersAbstract implements CreateUsersInterface
{
    public function 

    abstract protected function _createUser(array $newUser);
}