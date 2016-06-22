<?php
require_once 'LoggerInterface.php';

class LoggerInDB implements LoggerInterface {
    
    protected $dsn = '';
    protected $name= '';
    protected $password = '';

    function __construct($dsn, $name, $password){
        $this->dsn = $dsn;
        $this->name = $name;
        $this->password = $password;
    }

    public function warning($message)
    {
        // TODO: Implement warning() method.
        $dbh = new PDO($this->dsn, $this->name, $this->password);

        $statement = $dbh->prepare("INSERT INTO `log` (`message`, `type`, `creation_date`) values (?, ?, ?)");
        $inserted = $statement->execute([$message, 'warning', date('Y-m-d H:i:s')]);

        print("$inserted lines added.\n");
    }

    public function error($message)
    {
        // TODO: Implement error() method.
        $dbh = new PDO($this->dsn, $this->name, $this->password);

        $statement = $dbh->prepare("INSERT INTO `log` (`message`, `type`, `creation_date`) values (?, ?, ?)");
        $inserted = $statement->execute([$message, 'error', date('Y-m-d H:i:s')]);

        print("$inserted lines added.\n");
    }

    public function notice($message)
    {
        // TODO: Implement notice() method.
        $dbh = new PDO($this->dsn, $this->name, $this->password);

        $statement = $dbh->prepare("INSERT INTO `log` (`message`, `type`, `creation_date`) values (?, ?, ?)");
        $inserted = $statement->execute([$message, 'notice', date('Y-m-d H:i:s')]);

        print("$inserted lines added.\n");
    }
}

$dsn = 'mysql:host=localhost; dbname=test';
$name = 'pdo';
$password = 'test_pdo';

$message = "I'm a message";

$LoggerInDB = new LoggerInDB($dsn, $name, $password);
$LoggerInDB->error($message);
$LoggerInDB->warning($message);
$LoggerInDB->notice($message);
