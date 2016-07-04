<?php

namespace orm\src;

use orm\src\models\EntityModel;

class User extends EntityModel
{
    protected $tableName = 'user';
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
            return $this->data[$name];
        } elseif($this->functionName == 'set') {
            if(!$this->id) {
                $this->data[$name] = $arguments[0];
            } else {
                $this->updateData[$name] = $arguments[0];
            }
        }
    }
}
