<?php
interface LoggerInterface {
    public function warning($message);
    public function error($message);
    public function notice($message);
}
