<?php
interface LoggerInterface {
    const TYPE_WARNING = 'warning';
    const TYPE_ERROR = 'error';
    const TYPE_NOTICE = 'notice';
    public function warning($message);
    public function error($message);
    public function notice($message);
}
