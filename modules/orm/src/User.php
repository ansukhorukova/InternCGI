<?php

namespace modules\orm\src;

use modules\orm\models\EntityModel;

class User extends EntityModel
{
    protected $tableName = 'user';
    protected $data = array();
    protected $name;
    protected $email;



    /**
     * @return string $name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return string $email
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * UsersController constructor.
     * Implement transfer connection to model
     *
     * @param PDO object $dbh
     */
    public function __construct($dbh)
    {
        parent::__construct($dbh, $this->tableName);
    }
}
