<?php

require_once 'vendor/Autoloader.php';

$loader = new \Autoloader\Psr4Autoloader;

$loader->register();

$loader->addNamespace('Spet', __DIR__ . '/app/Spet/Src');
$loader->addNamespace('Orm', __DIR__ . '/vendor/Orm/Src/Models');
$loader->addNamespace('Logger', __DIR__ . '/vendor/Logger/Src/Models');
$loader->addNamespace('Configs', __DIR__ . '/vendor/Configs/Src');

use Spet\Database\ConnectToDataBase;
use Spet\Orm\User;
use Spet\Logger\LoggerAdapter;
use Configs\ConfigDataBase;
use Configs\ConfigPathToLoggers;
use Spet\ManagePanel\AuthorizationForm;

$connectToDataBase = new ConnectToDataBase(ConfigDataBase::$configPdoDataBase);
$dbh = $connectToDataBase->getConnect();

$chooseLogger = new LoggerAdapter(ConfigPathToLoggers::$loggerInFile);
$logger = $chooseLogger->getLogger();

if(!isset($_SESSION['authorized'])) {
    $form = new AuthorizationForm();
} else {
    unset($form);
    $user = new User($dbh);
}


/**
 * Use logger to write log into DB or File
 */
/*
$message = "I'm a message";
$logger->notice($message);
*/
$connectToDataBase->disConnect();
