<?php
require_once 'LoggerInDB.php';
require_once 'LoggerInFileSystem.php';

$message = "I'm a message";

/**Use logger to write log into DB

$LoggerInDB = new LoggerInDB();

$LoggerInDB->error($message);
$LoggerInDB->warning($message);
$LoggerInDB->notice($message);
 */
/**Use logger to write log into file
 *
 */
    $LoggerInFileSystem = new LoggerInFileSystem(DSN, NAME, PASSWORD);

    $LoggerInFileSystem->error($message);
    $LoggerInFileSystem->warning($message);
    $LoggerInFileSystem->notice($message);

/**
 * Close DB connection
 */
$dbh = null;
?>
