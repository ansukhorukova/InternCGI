<?php
require_once 'ConnectToPDODB.php';
require_once 'LoggerFile.php';
require_once 'LoggerInDB.php';
require_once 'LoggerInFileSystem.php';

$message = "I'm a message";
/**Use logger to write log into DB
*/
$LoggerInDB = new LoggerInDB($ConnectToPDODB->connectToDB());

    $LoggerInDB->error($message);
    $LoggerInDB->warning($message);
    $LoggerInDB->notice($message);

/**
 * When it'll finish to work with PDO database
 * it'll close connection to database
 */
unset($ConnectToPDODB);

/**Use logger to write log into file
 */
$LoggerInFileSystem = new LoggerInFileSystem($logFile);

    $LoggerInFileSystem->error($message);
    $LoggerInFileSystem->warning($message);
    $LoggerInFileSystem->notice($message);

?>
