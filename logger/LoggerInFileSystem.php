<?php
require_once 'LoggerAbstract.php';

class LoggerInFileSystem extends LoggerAbstract {

    function __construct($logFile) {
        $this->logFile = $logFile;
    }

    protected function _writeMessage($message, $type) {
        // TODO: Implement abstract writeMessage() method.
        $fileOpen = fopen($this->logFile, 'a+');
        fwrite($fileOpen, 'Message: ' . $message . ' || ');
        fwrite($fileOpen, 'Type: ' . $type . ' || ');
        fwrite($fileOpen, 'Creation Date: ' . date("d-m-Y H:i:s") . "\n");
        fclose($fileOpen);
    }
}
