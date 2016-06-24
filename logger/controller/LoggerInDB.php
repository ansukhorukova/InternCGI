<?php
namespace logger\controller;
use logger\core\LoggerAbstract;
use logger\config\ConfigPdoDataBase as ConfigPdoDataBase;

class LoggerInDB extends LoggerAbstract {

    protected $_dsn = null;
    protected $_name = null;
    protected $_password = null;
    protected $dbh = null;

    public function __construct() {
        // TODO: __construct() method writes connection data into local variables
        $this->_dsn = ConfigPdoDataBase::$dsn;
        $this->_name = ConfigPdoDataBase::$name;
        $this->_password = ConfigPdoDataBase::$password;
        $this->dbh = new \PDO($this->_dsn, $this->_name, $this->_password);
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
