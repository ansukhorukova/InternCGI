<?php

namespace Logger;

use Logger\Core\LoggerAbstract;

class LoggerInDataBase extends LoggerAbstract
{

    /**
     * @var PDO $dbh.
     */
    protected $dbh;

    /**
     * Implement __construct() get connect to DB.
     */
    public function __construct($dbh)
    {
        $this->dbh = $dbh;
    }

    /**
     * Implement abstract writeMessage() method.
     */
    protected function _writeMessage($message, $type)
    {
        $statement = $this->dbh->prepare("INSERT INTO `log` (`message`, `type`, `creation_date`) values (?, ?, ?)");
        $statement->execute([$message, $type, date('Y-m-d H:i:s')]);
    }
}
