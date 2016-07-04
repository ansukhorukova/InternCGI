<?php

use orm\src\User;
use logger\src\LoggerAdapter;
use configs\ConfigDataBase;
use configs\ConfigPathToLoggers;
use database\src\ConnectToDataBase;

require_once 'autoloader.php';

$connectToDataBase = new ConnectToDataBase(ConfigDataBase::$configPdoDataBase);
$dbh = $connectToDataBase->getConnect();

$chooseLogger = new LoggerAdapter(ConfigPathToLoggers::$loggerInFile);
$logger = $chooseLogger->getLogger();


/**
 * Connect with database contained in $dbh var.
 *
 * To work with logger, use $logger var
 */

//$user1->setName('Kolya');

//echo $user1->getName();
$user2 = new User($dbh[0]);
$user2->setName('Tom');
$user2->setEmail('Tomas@yahoo.com');
$user2->save();
/*
echo '<br>User2 ' . $user2->getId();
$user2->load(3);
var_dump($user2);
echo '<br>';
$user2->setName('Jerry');
$user2->setEmail('Jer11@ya.ru');*/
/*$user2->save();
echo '<br>';
var_dump($user2->getEmail());
var_dump($user2->getName());
//$user2->delete();


/*
$user1 = new User($dbh[0]);
$user1->load(3);

echo $user1->getId();
echo '<br>';
$user1->delete();
echo $user1->getId();
$user1->save();*/
$arrAll = $user2->loadAll();
var_dump($arrAll);


//$message = "I'm a message";

/**
 * Use logger to write log into DB
 */

//$logger->notice($message);

$connectToDataBase->disConnect();
