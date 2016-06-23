<?php
require_once 'LoggerAbstract.php';

class LoggerInDB extends LoggerAbstract {
    protected $dbh = null;

    function __construct($dbh) {
        $this->dbh = $dbh;
    }

    protected function _writeMessage($message, $type) {
        // TODO: Implement abstract writeMessage() method.
        $statement = $this->dbh->prepare("INSERT INTO `log` (`message`, `type`, `creation_date`) values (?, ?, ?)");
        $inserted = $statement->execute([$message, $type, date('Y-m-d H:i:s')]);
    }
}
