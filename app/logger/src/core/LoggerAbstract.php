<?php

namespace logger\src\core;

use logger\src\core\LoggerInterface;
use configs;

/**
 * Class LoggerAbstract
 *
 * @package modules\logger\core\abstracts
 */
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

    /**
     * Method _writeMessage() implements writing to database or file
     *
     * @param $message
     * @param string $type
     *
     * @return mixed
     */
    abstract protected function _writeMessage($message, $type);
}
