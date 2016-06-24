<?php

require_once './autoloader.php';
use logger\controller\LoggerInFileSystem as LoggerInFileSystem;
use logger\controller\LoggerInDB as LoggerInDB;
$message = "I'm a message";
/**Use logger to write log into DB
*/
$LoggerInDB = new LoggerInDB( logger\config\ConfigPdoDataBase::DSN,
                                                logger\config\ConfigPdoDataBase::NAME,
                                                logger\config\ConfigPdoDataBase::PASSWORD);

    $LoggerInDB->error($message);
    $LoggerInDB->warning($message);
    $LoggerInDB->notice($message);

/**
 * When it'll finish to work with PDO database
 * it'll close connection to database
 */

/**Use logger to write log into file
 */
$LoggerInFileSystem = new LoggerInFileSystem();

    $LoggerInFileSystem->error($message);
    $LoggerInFileSystem->warning($message);
    $LoggerInFileSystem->notice($message);