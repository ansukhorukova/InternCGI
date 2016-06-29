<?php

namespace models;

use configs\ConfigPdoDataBase as ConfigPdoDataBase;

class ConnectToDataBase
{
    public static function connectToPdo ()
    {
        /**
         * Method _ConnectToPdo implements connection to PDO database
         */
        return new \PDO(ConfigPdoDataBase::$dsn, ConfigPdoDataBase::$name, ConfigPdoDataBase::$password);
    }
}
