<?php

namespace Logger;

use Logger\Core\LoggerAbstract;

/**
 * Class LoggerInDataBase
 *
 * @package Logger
 */
class LoggerInDataBase extends LoggerAbstract
{

    /**
     * @var PDO object $dbh.
     */
    protected $dbh;

    /**
     * Method __construct() get connect to DB.
     *
     * @param object $dbh
     */
    public function __construct($dbh)
    {
        $this->dbh = $dbh;
    }

    /**
     * Implement abstract writeMessage() method.
     *
     * @param string $message.
     * @param string $type.
     */
    protected function _writeMessage($message, $type)
    {
        $statement = $this->dbh->prepare("INSERT INTO `log` (`message`, `type`, `creation_date`) values (?, ?, ?)");
        $statement->execute([$message, $type, date('Y-m-d H:i:s')]);
    }
}
