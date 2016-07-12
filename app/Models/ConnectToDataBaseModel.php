<?php

namespace Models;

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
    public $dbh;

    /**
     * ConnectToDataBase constructor. Create new PDO object and connect to database.
     *
     * @param array $dataBaseConfig.
     */
    public function __construct($dataBaseConfig)
    {
        $this->dbh = new \PDO($dataBaseConfig['dsn'], $dataBaseConfig['name'],
                              $dataBaseConfig['password'], $dataBaseConfig['options']);
    }

    /**
     * Method connect() return connection to database.
     *
     * @return object PDO.
     */
    public function getConnect()
    {
        return $this->dbh;
    }

    /**
     * Method disConnect() implements disconnection from database.
     */
    public function disConnect()
    {
        unset($this->dbh);
    }
}