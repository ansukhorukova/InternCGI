<?php

namespace Database;

/**
 * Class ConnectToDataBase implements connection to database.
 *
 * @package modules\database
 */
/**
 * Class ConnectToDataBase
 *
 * @package modules\database
 */
class ConnectToDataBase
{
    /**
     * @var \PDO $dbh.
     */
    public $dbh;

    /**
     * ConnectToDataBase constructor. Create new PDO object and connect to database.
     *
     * @param array $dataBaseConfig
     */
    public function __construct($dataBaseConfig)
    {
        $this->dbh = new \PDO($dataBaseConfig['dsn'], $dataBaseConfig['name'],
                              $dataBaseConfig['password'], $dataBaseConfig['options']);
    }

    /**
     * Method connect() return connection to database.
     *
     * @return \PDO
     */
    public function getConnect()
    {
        return $this->dbh;
    }

    /**
     * Method disConnect() implements disconnection from database.
     *
     * @param null|integer $numberOfConnection
     */
    public function disConnect($numberOfConnection = null)
    {
        unset($this->dbh);
    }
}