<?php

namespace controllers;

use modules\items\Items;

class UsersController extends Items
{
    private $tableName = 'user';

    public function __construct($dbh)
    {
        parent::__construct($dbh, $this->tableName);
    }
}