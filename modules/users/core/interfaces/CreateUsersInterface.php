<?php

namespace modules\users\core\interfaces;

interface CreateUsersInterface
{
    const ROLE_ADMIN = 'admin';
    const ROLE_MODERATOR = 'moderator';
    const ROLE_CUSTOMER = 'customer';

    public function createUser(array $newUser, $type);
}