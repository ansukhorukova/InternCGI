<?php

//use modules\logger\controller\LoggerInFileSystem as LoggerInFileSystem;
//use modules\logger\controller\LoggerInDB as LoggerInDB;
use model\Users;
use config\ConfigNewUser;

require_once 'autoloader.php';

$user = new Users();
//$user->create(ConfigNewUser::$newUser);
$user->getCollection();
echo '<br>';
$userArr = array('id'=>null, 'email'=>'customer2@example.com');
$user->getSingleton($userArr);
echo '<br>';
$deleteUser = array('id'=>9, 'email'=>null);
$user->delete($deleteUser);

$user->getCollection();


unset($user);

//$message = "I'm a message";

/**
 * Use logger to write log into DB
 */
//$LoggerInDB = new LoggerInDB();

//$LoggerInDB->error($message);
//$LoggerInDB->warning($message);
//$LoggerInDB->notice($message);

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
