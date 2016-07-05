<?php

namespace Orm;

use Orm\Models\EntityModel;

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
     * Specify the options for encrypting password.
     *
     * @var array $optionsForPass.
     */
    protected $optionsForPass = array('cost' => 13);

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
     * @return string
     */
    public function __call($name, $arguments)
    {
        $this->_functionName = substr($name, 0, 3);
        $name = strtolower(substr($name, 3));
        if($this->_functionName == 'get') {
            if($name == 'password') {
                return false;
            } elseif(!isset($this->_data[$name])) {
                return false;
            } else {
                return $this->_data[$name];
            }
        } elseif($this->_functionName == 'set') {
            if($name == 'password') {
                $arguments[0] = password_hash($arguments[0], PASSWORD_BCRYPT, $this->optionsForPass);
            }
            if(!$this->_id) {
                $this->_data[$name] = $arguments[0];
            } else {
                $this->_updateData[$name] = $arguments[0];
            }
        }
    }
}
