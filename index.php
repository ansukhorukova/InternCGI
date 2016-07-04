<?php

use Orm\Src\User;
use Logger\Src\LoggerAdapter;
use Configs\ConfigDataBase;
use Configs\ConfigPathToLoggers;
use Database\Src\ConnectToDataBase;

require_once 'autoloader.php';

$connectToDataBase = new ConnectToDataBase(ConfigDataBase::$configPdoDataBase);
$dbh = $connectToDataBase->getConnect();

$chooseLogger = new LoggerAdapter(ConfigPathToLoggers::$loggerInFile);
$logger = $chooseLogger->getLogger();


/**
 * Connect with database contained in array $dbh.
 *
 * To work with logger, use $logger var
 */

// 1. Creating a record

$user1 = new User($dbh[0]);
$user1->setName('Ivan');
$user1->setEmail('Vanya123@exe.com');
$user1->save();

echo $user1->getId();
echo '<br>';
echo $user1->getName();

// 2. Loading / updating a record

$user2 = new User($dbh[0]);
$user2->load(6);

echo $user2->getId();
echo '<br>';
echo $user2->getName();
echo '<br>';
echo $user2->getEmail();

$user2->setEmail('exemple@mail.com');
$user2->save();

// 3. Deleting record

$user3 = new User($dbh[0]);
$user3->load(4);
$user3->delete();
var_dump($user3->loadAll());

// Object comparison

echo 'User1:';
echo '<br>';
$user1->getId();
echo '<br>';
echo $user1->getName();
echo '<br>';

echo 'User2:';
echo '<br>';
echo $user2->getId();
echo '<br>';
echo $user2->getName();
echo '<br>';

echo 'User3:';
echo '<br>';
$user3->getId();
echo '<br>';
echo $user3->getName();
/**
 * Use logger to write log into DB or File
 */

//$message = "I'm a message";
//$logger->notice($message);

$connectToDataBase->disConnect();
