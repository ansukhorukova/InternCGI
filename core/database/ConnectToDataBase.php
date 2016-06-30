<?php

namespace core\database;

class ConnectToDataBase
{
    public $dbh;

    public function __construct($dataBaseConfig)
    {
        $this->dbh = new \PDO($dataBaseConfig['dsn'], $dataBaseConfig['name'],
                              $dataBaseConfig['password'], $dataBaseConfig['options']);
    }

    /**
     * @return \PDO
     */
    public function connect()
    {
        return $this->dbh;
    }

    public function disConnect() {
        unset($this->dbh);
    }
}