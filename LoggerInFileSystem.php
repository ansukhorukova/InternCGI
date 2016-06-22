<?php
require_once 'LoggerInterface.php';

class LoggerInFileSystem implements LoggerInterface {
    public function warning($message)
    {
        // TODO: Implement warning() method.
        $fileOpen = fopen('LoggerFile.txt', 'a+');
        fwrite($fileOpen, 'Message: ' . $message . "\t");
        fwrite($fileOpen, 'Type: Warning' . "\t");
        fwrite($fileOpen, 'Creation Date: ' . date("d-m-Y H:i:s") . "\n");
        fclose($fileOpen);
    }

    public function error($message)
    {
        // TODO: Implement error() method.
        $fileOpen = fopen('LoggerFile.txt', 'a+');
        fwrite($fileOpen, 'Message: ' . $message . "\t");
        fwrite($fileOpen, 'Type: Error' . "\t");
        fwrite($fileOpen, 'Creation Date: ' . date("d-m-Y H:i:s") . "\n");
        fclose($fileOpen);
    }

    public function notice($message)
    {
        // TODO: Implement notice() method.
        $fileOpen = fopen('LoggerFile.txt', 'a+');
        fwrite($fileOpen, 'Message: ' . $message . "\t");
        fwrite($fileOpen, 'Type: Notice' . "\t");
        fwrite($fileOpen, 'Creation Date: ' . date("d-m-Y H:i:s") . "\n");
        fclose($fileOpen);
    }
}


$message = "I'm a message";

$LoggerInFileSystem = new LoggerInFileSystem();
$LoggerInFileSystem->error($message);
$LoggerInFileSystem->warning($message);
$LoggerInFileSystem->notice($message);

