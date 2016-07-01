<?php

namespace configs;

/**
 * Class ConfigPathToLoggers contains path to models files module of Logger
 *
 * @param string $loggerInDataBase
 * @param string $loggerInFile
 */
class ConfigPathToLoggers
{
    public static $loggerInDataBase = 'modules\logger\models\LoggerInDataBase';
    public static $loggerInFile = 'modules\logger\models\LoggerInFile';
}