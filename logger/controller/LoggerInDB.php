<?php
namespace logger\controller;
use logger\core\LoggerAbstract;
use logger\model;
use PDO;

class LoggerInDB extends LoggerAbstract {

    protected $_dsn = null;
    protected $_name = null;
    protected $_password = null;
    protected $dbh = null;

    public function __construct($dsn, $name, $password) {
        // TODO: __construct() method writes connection data into local variables
        $this->_dsn = $dsn;
        $this->_name = $name;
        $this->_password = $password;
        $this->dbh = new PDO($this->_dsn, $this->_name, $this->_password);
    }

    public function __destruct() {
        // TODO: Implement __destruct() method.
        unset($this->dbh);
    }
    
    protected function _writeMessage($message, $type) {
        // TODO: Implement abstract writeMessage() method.
        $statement = $this->dbh->prepare("INSERT INTO `log` (`message`, `type`, `creation_date`) values (?, ?, ?)");
        $inserted = $statement->execute([$message, $type, date('Y-m-d H:i:s')]);
    }
}
