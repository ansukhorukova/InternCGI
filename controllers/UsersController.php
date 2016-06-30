<?php

namespace controllers;

use modules\items\Items;

class UsersController extends Items
{
    protected $tableName = 'user';
    protected $name;
    protected $email;
    protected $date;

    public function __set($name, $values)
    {
        $this->$name = $values;
    }

    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function load($id)
    {
        $row = parent::load($id);
        foreach ($row as $key => $value) {
            $this->__set($key, $value);
        }
    }


    public function __construct($dbh)
    {
        parent::__construct($dbh, $this->tableName);
    }
}