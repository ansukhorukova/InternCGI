<?php

namespace Logger\Core;

/**
 * Interface LoggerInterface.
 *
 * @package Logger\Core.
 */
interface LoggerInterface
{
    /**
     * Constant contains 'warning' type for writing method.
     */
    const TYPE_WARNING = 'warning';
    /**
     * Constant contains 'error' type for writing method.
     */
    const TYPE_ERROR = 'error';
    /**
     * Constant contains 'notice' type for writing method.
     */
    const TYPE_NOTICE = 'notice';

    /**
     * Write 'warning' message in log.
     *
     * @param string $message.
     *
     * @return void.
     */
    public function warning($message);

    /**
     * Write 'error' message in log.
     *
     * @param string $message.
     *
     * @return void.
     */
    public function error($message);

    /**
     * Write 'notice' message in log.
     *
     * @param string $message.
     *
     * @return void.
     */
    public function notice($message);
}
