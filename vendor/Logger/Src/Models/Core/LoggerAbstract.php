<?php

namespace Logger\Core;

use Configs;

/**
 * Class LoggerAbstract.
 *
 * @package modules\logger\core\abstracts.
 */
abstract class LoggerAbstract implements LoggerInterface
{
    /**
     * Write 'warning' message in log.
     *
     * @param string $message.
     *
     * @return void.
     */
    public function warning($message)
    {
        $this->_writeMessage($message, LoggerInterface::TYPE_WARNING);
    }

    /**
     * Write 'error' message in log.
     *
     * @param string $message.
     *
     * @return void.
     */
    public function error($message)
    {
        $this->_writeMessage($message, LoggerInterface::TYPE_ERROR);
    }

    /**
     * Write 'notice' message in log.
     *
     * @param string $message.
     *
     * @return void.
     */
    public function notice($message)
    {
        $this->_writeMessage($message, LoggerInterface::TYPE_NOTICE);
    }

    /**
     * Method _writeMessage() implements writing to database or file.
     *
     * @param string $message.
     * @param string $type.
     */
    abstract protected function _writeMessage($message, $type);
}
