<?php

namespace Models;

use Configs\ConfigDataBase;

/**
 * Class ConnectToDataBase implements connection to database.
 *
 * @package modules\database.
 */
class ConnectToDataBaseModel
{
    /**
     * @var \PDO $dbh.
     */
    static private $instance = null;
    /**
     * @var null|string Database config.
     */
    private $_dsn;
    /**
     * @var null|string Username database.
     */
    private $_username;
    /**
     * @var null|string Database password.
     */
    private $_password;
    /**
     * @var null|string Database options.
     */
    private $_options;
    /**
     * @var null|object Connection to db.
     */
    private $_dbh = null;

    private function __construct()
    {
        $config = $this->_getConfigData();
        $this->_dsn = $config['dsn'];
        $this->_username = $config['name'];
        $this->_password = $config['password'];
        $this->_options = $config['options'];


    }
    private function __clone() { /* ... @return Singleton */ }
    private function __wakeup() { /* ... @return Singleton */ }

    static public function getInstance() {
        return
            self::$instance === null
                ? self::$instance = new static()//new self()
                : self::$instance;
    }

    /**
     * Method connect() return connection to database.
     *
     * @return object PDO.
     */
    public function getConnectToDataBase()
    {
        return $this->_dbh = new \PDO($this->_dsn, $this->_username, $this->_password, $this->_options);
    }

    /**
     * Method disConnect() implements disconnection from database.
     */
    public function disConnect()
    {
        unset($this->_dbh);
    }

    /**
     * Get config database data
     *
     * @return array
     */
    private function _getConfigData()
    {
        return ConfigDataBase::$configDataBase;
    }
}