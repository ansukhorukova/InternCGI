<?php
require_once 'LoggerInterface.php';

abstract class LoggerAbstract implements LoggerInterface {

    public function warning($message) {
        // TODO: Implement warning() method.
        $this->_writeMessage($message, LoggerInterface::TYPE_WARNING);
    }

    public function error($message)
    {
        // TODO: Implement error() method.
        $this->_writeMessage($message, LoggerInterface::TYPE_ERROR);
    }

    public function notice($message)
    {
        // TODO: Implement notice() method.
        $this->_writeMessage($message, LoggerInterface::TYPE_NOTICE);
    }

    abstract protected function _writeMessage($message, $type);
}