<?php

use controllers\UsersController;

require_once 'autoloader.php';
require_once 'configs' . DIRECTORY_SEPARATOR . 'SystemStartConfig.php';

/**
 * Connect with database contained in $dbh var.
 *
 * To work with logger, use $logger var
 */


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

//$LoggerInDB->error($message);
//$LoggerInDB->warning($message);
$logger->notice($message);
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
require_once 'configs' . DIRECTORY_SEPARATOR . 'SystemStopConfig.php';
