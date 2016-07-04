<?php

namespace orm\src;

use orm\src\models\EntityModel;

class User extends EntityModel
{
    protected $tableName = 'user';
    protected $optionsForPass = array('cost' => 13);
    /**
     * UsersController constructor.
     * Implement transfer connection to model
     *
     * @param PDO object $dbh
     */
    public function __construct($dbh, $logger = null)
    {
        parent::__construct($dbh, $this->tableName, $logger);

    }

    /**
     * Magic method __call() is used for set or get properties, without creating get and set methods.
     *
     * @param string $name. Name of called function.
     * @param array $arguments. Arguments of called function.
     * @return array
     */
    public function __call($name, $arguments)
    {
        $this->functionName = substr($name, 0, 3);
        $name = strtolower(substr($name, 3));
        if($this->functionName == 'get') {
            if($name == 'password') {
                return false;
            } else {
                return $this->data[$name];
            }
        } elseif($this->functionName == 'set') {
            if($name == 'password') {
                $arguments[0] = password_hash($arguments[0], PASSWORD_BCRYPT, $this->optionsForPass);
            }
            if(!$this->id) {
                $this->data[$name] = $arguments[0];
            } else {
                $this->updateData[$name] = $arguments[0];
            }
        }
    }
}
