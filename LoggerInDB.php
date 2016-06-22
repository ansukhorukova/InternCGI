<?php
require_once 'LoggerAbstract.php';

class LoggerInDB extends LoggerAbstract {

    function __construct($dns, $name, $password) {
        $this->dbh = new PDO($dns, $name, $password);
    }

    function __destruct() {
        // TODO: Implement __destruct() method.
        unset($this->dbh);
    }

    protected function _writeMessage($message, $type) {
        // TODO: Implement abstract writeMessage() method.
        $statement = $this->dbh->prepare("INSERT INTO `log` (`message`, `type`, `creation_date`) values (?, ?, ?)");
        $inserted = $statement->execute([$message, $type, date('Y-m-d H:i:s')]);
    }
}
