<?php

namespace logger\src\models;

use logger\src\core\LoggerAbstract;
use configs\ConfigPathToLogFile;

class LoggerInFile extends LoggerAbstract
{
    /**
     * @var null|string $logFile.
     */
    protected $logFile = null;

    /**
     * Getting path to store logs.
     */
    function __construct()
    {
        $this->logFile = $_SERVER['DOCUMENT_ROOT'] . ConfigPathToLogFile::$logFile;
    }

    /**
     * Implement abstract writeMessage() method.
     */
    protected function _writeMessage($message, $type)
    {
        $fileOpen = fopen($this->logFile, 'a+');
        fwrite($fileOpen, 'Message: ' . $message . ' || ');
        fwrite($fileOpen, 'Type: ' . $type . ' || ');
        fwrite($fileOpen, 'Creation Date: ' . date("d-m-Y H:i:s") . "\n");
        fclose($fileOpen);
    }
}
