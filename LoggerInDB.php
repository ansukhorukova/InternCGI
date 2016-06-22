<?php
require_once 'ConfigDB.php';
require_once 'LoggerAbstract.php';

class LoggerInDB extends LoggerAbstract {

    protected function _writeMessage($message, $type) {
        // TODO: Implement abstract writeMessage() method.
        $dbh = new PDO(DSN, NAME, PASSWORD);
        $statement = $dbh->prepare("INSERT INTO `log` (`message`, `type`, `creation_date`) values (?, ?, ?)");
        $inserted = $statement->execute([$message, $type, date('Y-m-d H:i:s')]);
        $dbh = null;
    }
}
