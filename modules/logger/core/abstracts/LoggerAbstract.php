<?php

namespace modules\logger\core\abstracts;

use modules\logger\controller;
use modules\logger\core\interfaces\LoggerInterface as LoggerInterface;
use config;

abstract class LoggerAbstract implements LoggerInterface
{

    public function warning($message)
    {
        /**
         * Implement warning() method.
         */
        $this->_writeMessage($message, LoggerInterface::TYPE_WARNING);
    }

    public function error($message)
    {
        /**
         * Implement error() method.
         */
        $this->_writeMessage($message, LoggerInterface::TYPE_ERROR);
    }

    public function notice($message)
    {
        /**
         * Implement notice() method.
         */
        $this->_writeMessage($message, LoggerInterface::TYPE_NOTICE);
    }

    abstract protected function _writeMessage($message, $type);
}
