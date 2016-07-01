<?php

namespace modules\orm\src;

use modules\database\ConnectToDataBase;
use modules\orm\models\EntityModel;

class User extends EntityModel
{
    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->data['email'];
    }

    /**
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->data['email'] = $email;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->data['name'];
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->data['name'] = $name;
    }

    /**
     * UsersController constructor.
     * Implement transfer connection to model
     *
     * @param PDO object $dbh
     */
    public function __construct($dbh, $tableName)
    {
        if(!$tableName) {
            die("When creating new object need give two parameters 'connectToDB' and 'tableName'");
        } else {
            parent::__construct($dbh, $tableName);
        }
    }
}
