<?php

namespace Configs;

/**
 * Class ConfigPathToLoggers contains path to models files module of Logger
 *
 * @param string $loggerInDataBase
 * @param string $loggerInFile
 */
class ConfigPathToLoggers
{
    public static $loggerInDataBase = 'Logger\Models\LoggerInDataBase';
    public static $loggerInFile = 'Logger\Models\LoggerInFile';
}