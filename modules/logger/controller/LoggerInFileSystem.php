<?php

namespace modules\logger\controller;

use modules\logger\core\abstracts\LoggerAbstract;
use config\ConfigPathToLogFile;

class LoggerInFileSystem extends LoggerAbstract
{
    protected $logFile = null;

    function __construct()
    {
        /**
         * Getting path to store logs
         */
        $this->logFile = $_SERVER['DOCUMENT_ROOT'] . ConfigPathToLogFile::$logFile;
    }

    protected function _writeMessage($message, $type)
    {
        /**
         * Implement abstract writeMessage() method.
         */
        $fileOpen = fopen($this->logFile, 'a+');
        fwrite($fileOpen, 'Message: ' . $message . ' || ');
        fwrite($fileOpen, 'Type: ' . $type . ' || ');
        fwrite($fileOpen, 'Creation Date: ' . date("d-m-Y H:i:s") . "\n");
        fclose($fileOpen);
    }
}
