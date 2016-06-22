<?php
require_once 'LoggerAbstract.php';
require_once 'LoggerFile.php';

class LoggerInFileSystem extends LoggerAbstract {

    protected function _writeMessage($message, $type) {
        // TODO: Implement abstract writeMessage() method.
        $fileOpen = fopen(LOG_FILE, 'a+');
        fwrite($fileOpen, 'Message: ' . $message . ' || ');
        fwrite($fileOpen, 'Type: ' . $type . ' || ');
        fwrite($fileOpen, 'Creation Date: ' . date("d-m-Y H:i:s") . "\n");
        fclose($fileOpen);
    }
}
