<?php

require_once 'Core/Model.php';
require_once 'Core/View.php';
require_once 'Core/Controller.php';
require_once 'Core/Route.php';

$loader = new \Autoloader\Psr4Autoloader;

$loader->register();

$loader->addNamespace('Controllers',$_SERVER['DOCUMENT_ROOT'] . '/app/Controllers');
$loader->addNamespace('Models', $_SERVER['DOCUMENT_ROOT'] . '/app/Models');
$loader->addNamespace('Core', $_SERVER['DOCUMENT_ROOT'] . '/app/Core');
$loader->addNamespace('Orm', $_SERVER['DOCUMENT_ROOT'] . '/vendor/Orm/Src/Models');
$loader->addNamespace('Logger', $_SERVER['DOCUMENT_ROOT'] . '/vendor/Logger/Src/Models');
$loader->addNamespace('Configs', $_SERVER['DOCUMENT_ROOT'] . '/vendor/Configs/Src');

use Core\Route;
use Models\ConnectToDataBaseModel;
use Models\UserModel;
use Controllers\LoggerController;
use Configs\ConfigDataBase;
use Configs\ConfigPathToLoggers;

/*$connectToDataBase = new ConnectToDataBaseModel(ConfigDataBase::$configPdoDataBase);
$dbh = $connectToDataBase->getConnect();

$chooseLogger = new LoggerController(ConfigPathToLoggers::$loggerInFile);
$logger = $chooseLogger->getLogger();
*/
Route::start(); // Starting the route