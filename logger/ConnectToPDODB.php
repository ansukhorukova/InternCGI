<?php
require_once 'ConfigPDODB.php';

class ConnectToPDODB {
    protected $_dsn = null;
    protected $_name = null;
    protected $_password = null;
    public $dbh = null;

    public function __construct($dsn, $name, $password) {
        // TODO: __construct() method writes connection data into local variables
        $this->_dsn = $dsn;
        $this->_name = $name;
        $this->_password = $password;
    }

    public function __destruct() {
        // TODO: Implement __destruct() method.
        unset($this->dbh);
    }

    public function connectToDB () {
        return $this->dbh = new PDO($this->_dsn, $this->_name, $this->_password);
    }
}

$ConnectToPDODB = new ConnectToPDODB($dsn, $name, $password);