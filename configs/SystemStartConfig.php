<?php

use controllers\LoggerController;
use configs\ConfigDataBase;
use configs\ConfigPathToLoggers;
use core\database\ConnectToDataBase;

$connectToDataBase = new ConnectToDataBase(ConfigDataBase::$configPdoDataBase);
$dbh = $connectToDataBase->connect();

$chooseLogger = new LoggerController(ConfigPathToLoggers::$loggerInDataBase, $dbh);
$logger = $chooseLogger->getLogger();
