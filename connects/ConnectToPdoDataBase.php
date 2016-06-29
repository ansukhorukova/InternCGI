<?php

namespace connects;

use configs\ConfigPdoDataBase;

class ConnectToPdoDataBase
{
    public $dbh;

    public function __construct()
    {
        $this->dbh = new \PDO(ConfigPdoDataBase::$dsn, ConfigPdoDataBase::$name, ConfigPdoDataBase::$password);
    }

    /**
     * @return \PDO
     */
    public function getDbh()
    {
        return $this->dbh;
    }
}