<?php

namespace Spet\Logger;

/**
 * Class LoggerAdapter loads config database file
 *     and creates new object to connection to database.
 *
 * @package Spet\Logger
 */
class LoggerAdapter
{
    /**
     * @var string $logger.
     */
    private $logger;
    /**
     * @var string $loggerName.
     */
    private $loggerName;
    /**
     * @var null|PDO $dbh.
     */
    private $dbh;

    /**
     * Getting path to file for logging.
     */
    public function __construct($loggerName, $dbh = null)
    {
        $this->loggerName = $loggerName;
        $this->dbh = $dbh;
    }

    /**
     * Connect to logger and return it.
     */
    public function getLogger()
    {
        return $this->logger = new $this->loggerName($this->dbh);
    }
}