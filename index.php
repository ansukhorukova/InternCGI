<?php

use modules\orm\src\Users;
use modules\logger\src\LoggerAdapter;
use configs\ConfigDataBase;
use configs\ConfigPathToLoggers;
use modules\database\ConnectToDataBase;

require_once 'autoloader.php';

$connectToDataBase = new ConnectToDataBase(ConfigDataBase::$configPdoDataBase);
$dbh = $connectToDataBase->connect();

$chooseLogger = new LoggerAdapter(ConfigPathToLoggers::$loggerInDataBase, $dbh);
$logger = $chooseLogger->getLogger();


/**
 * Connect with database contained in $dbh var.
 *
 * To work with logger, use $logger var
 */

//$user1 = new Users($dbh);
//$user1->setName('Kolya');
//echo $user1->getName();
$user2 = new Users($dbh);
$user2->setName('Ivan2');
$user2->setEmail('exempl4e@gmail.com');
$user2->save();
//$user1->name = 'Vanya';
//echo 'User2' . $user2->getId();
$user2->load(1);
//$user2->setEmail('prim36er@ya.ru');
//$user2->save();

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

//$logger->notice($message);

$connectToDataBase->disConnect();
