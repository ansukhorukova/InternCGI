<?php

namespace Spet\Orm;

use Orm\EntityModel;

class User extends EntityModel
{
    /**
     * Specify the table name to work with database.
     *
     * @var string $_tableName.
     */
    protected $_tableName = 'user';

    /**
     * Specify the id field name.
     *
     * @var string $_idName.
     */
    protected $_idName = 'id';

    /**
     * UsersController constructor.
     * Implement transfer connection to model
     *
     * @param PDO object $dbh
     */
    public function __construct($dbh, $logger = null)
    {
        parent::__construct($dbh, $this->_tableName, $this->_idName, $logger);

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
        $this->_functionName = substr($name, 0, 3);
        $name = strtolower(substr($name, 3));
        if($this->_functionName == 'get') {
            return !isset($this->_data[$name]) ? false : $this->_data[$name];
        } elseif($this->_functionName == 'set') {
            if(!isset($this->_data[$this->_idName])) {
                $this->_data[$name] = $arguments[0];
            } else {
                $this->_updateData[$name] = $arguments[0];
            }
        }
    }
}
