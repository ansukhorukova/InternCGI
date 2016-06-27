<?php
namespace logger\controller;
use logger\core\LoggerAbstract;
use logger\config\ConfigPathToLogFile;

class LoggerInFileSystem extends LoggerAbstract {
    protected $logFile = null;

    function __construct() {
        $this->logFile = $_SERVER['DOCUMENT_ROOT'] . ConfigPathToLogFile::$logFile;
    }

    protected function _writeMessage($message, $type) {
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
