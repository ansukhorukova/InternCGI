<?php

//use modules\logger\controller\LoggerInFileSystem as LoggerInFileSystem;
use controllers\logger\LoggerInDB;
use models\Users;
use models\ConnectToDataBase;
use configs\ConfigNewUser;

require_once 'autoloader.php';

$database = 'connects\ConnectToPdoDataBase';

$connect = new ConnectToDataBase($database);
$dbh = $connect->getConnect();
/*
$user = new Users($dbh);
$user->getCollection();
echo '<br>';
$user->create(ConfigNewUser::$newUser);
$user->getCollection();
echo '<br>';
$userArr = array('id'=>null, 'email'=>'customer2@example.com');
$user->getSingleton($userArr);
echo '<br>';
$deleteUser = array('id'=>15, 'email'=>null);
$user->delete($deleteUser);

$user->getCollection();
*/



$message = "I'm a message";

/**
 * Use logger to write log into DB
 */
$LoggerInDB = new LoggerInDB($dbh);

//$LoggerInDB->error($message);
//$LoggerInDB->warning($message);
$LoggerInDB->notice($message);
unset($dbh);
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
