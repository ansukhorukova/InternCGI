<?php

namespace controllers;

class LoggerController
{
    private $logger;
    private $loggerName;
    private $dbh;

    public function __construct($loggerName, $dbh = null)
    {
        $this->loggerName = $loggerName;
        $this->dbh = $dbh;
    }

    public function getLogger()
    {
        return $this->logger = new $this->loggerName($this->dbh);
    }
}