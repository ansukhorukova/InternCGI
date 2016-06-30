<?php

namespace modules\logger;

use core\abstracts\logger\LoggerAbstract;

class LoggerInDataBase extends LoggerAbstract
{

    protected $dbh;

    public function __construct($dbh)
    {
        /**
         * Implement __construct() get connect to DB
         */
        $this->dbh = $dbh;
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
