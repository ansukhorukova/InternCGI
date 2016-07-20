<?php

ini_set('display_errors', 1);

require_once __DIR__ . '/vendor/Autoloader.php';
require_once __DIR__ . '/app/Bootstrap.php';

use Core\Route;

/*
$chooseLogger = new LoggerController(ConfigPathToLoggers::$loggerInFile);
$logger = $chooseLogger->getLogger();
*/

Route::start(); // Starting the route
/**
 * Use logger to write log into DB or File
 */
/*
$message = "I'm a message";
$logger->notice($message);
*/
//$connectToDataBase->disConnect();
