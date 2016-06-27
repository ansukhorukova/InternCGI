<?php
namespace logger\model;
use logger\config\ConfigPdoDataBase as ConfigPdoDataBase;

class ConnectToDataBase {
    public static function _ConnectToPdo () {
        // TODO: method _ConnectToPdo implements connection to PDO database
        return new \PDO(ConfigPdoDataBase::$dsn, ConfigPdoDataBase::$name, ConfigPdoDataBase::$password);
    }
}