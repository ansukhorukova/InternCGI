<?php

namespace controllers\logger;

use core\abstracts\logger\LoggerAbstract;
use models\ConnectToDataBase;

class LoggerInDB extends LoggerAbstract
{

    protected $dbh = null;

    public function __construct()
    {
        /**
         * Implement __construct() method for connect to DB
         */
        $this->dbh = ConnectToDataBase::connectToPdo();
    }

    public function __destruct()
    {
        /**
         * Implement __destruct() method. It closes connection to DB when object will be removed
         */
        unset($this->dbh);
    }
    
    protected function _writeMessage($message, $type)
    {
        /**
         * Implement abstract writeMessage() method.
         */
        $statement = $this->dbh->prepare("INSERT INTO `log` (`message`, `type`, `creation_date`) values (?, ?, ?)");
        $statement->execute([$message, $type, date('Y-m-d H:i:s')]);
    }
}
