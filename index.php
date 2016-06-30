<?php

use controllers\UsersController;
use controllers\LoggerController;
use configs\ConfigDataBase;
use configs\ConfigPathToLoggers;
use core\database\ConnectToDataBase;

require_once 'autoloader.php';

$connectToDataBase = new ConnectToDataBase(ConfigDataBase::$configPdoDataBase);
$dbh = $connectToDataBase->connect();

$chooseLogger = new LoggerController(ConfigPathToLoggers::$loggerInDataBase, $dbh);
$logger = $chooseLogger->getLogger();


/**
 * Connect with database contained in $dbh var.
 *
 * To work with logger, use $logger var
 */

//$user1 = new UsersController($dbh);
//$user1->setName('Kolya');
//echo $user1->getName();
$user2 = new UsersController($dbh);
//$user2->setName('Ivan1');
//$user2->setEmail('exempl2e@gmail.com');
//$user2->save();
//$user1->name = 'Vanya';
//echo 'User2' . $user2->getId();
$user2->load(5);
$user2->setEmail('prim3er@ya.ru');
$user2->save();
//$user2->delete();
//$user1->save();
//echo $user1->getId();
//echo 'user1';
//$arr =  $user1->load(4);
//var_dump($arr);
//echo $user1->getId();
$arrAll = $user2->loadAll();
var_dump($arrAll);


//$message = "I'm a message";

/**
 * Use logger to write log into DB
 */

//$LoggerInDB->error($message);
//$LoggerInDB->warning($message);
//$logger->notice($message);
/**
 * When it'll finish to work with PDO database
 * it'll close connection to database
 */
//unset($LoggerInDB);

/**
 * Use logger to write log into file
 */
//$LoggerInFileSystem = new LoggerInFileSystem();

//$LoggerInFileSystem->error($message);
//$LoggerInFileSystem->warning($message);
//$LoggerInFileSystem->notice($message);
$connectToDataBase->disConnect();
