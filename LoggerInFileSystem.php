<?php
require_once 'LoggerAbstract.php';

class LoggerInFileSystem extends LoggerAbstract {

    const LOG_FILE = 'log.txt';
    protected function _writeMessage($message, $type) {
        // TODO: Implement abstract writeMessage() method.
        $fileOpen = fopen(self::LOG_FILE, 'a+');
        fwrite($fileOpen, 'Message: ' . $message . ' || ');
        fwrite($fileOpen, 'Type: ' . $type . ' || ');
        fwrite($fileOpen, 'Creation Date: ' . date("d-m-Y H:i:s") . "\n");
        fclose($fileOpen);
    }
}
