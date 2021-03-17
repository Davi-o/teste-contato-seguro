<?php

namespace Service;

use Connection\DatabaseConfiguration;
use PDO;

/**
 * Class Connection
 * @package Service
 */
class Connection extends PDO
{
    /**
     * @var PDO
     */
    protected static PDO $connection;

    /**
     * Connection constructor.
     * @param $dsn
     * @param null $username
     * @param null $password
     * @param null $options
     */
    public function __construct($dsn, $username = null, $password = null, $options = null)
    {
        parent::__construct($dsn, $username, $password, $options);
    }

    /**
     * @return PDO
     */
    public static function connect(): PDO
    {
        if (! isset(self::$connection)) {
            self::$connection = new Connection("sqlite:".DatabaseConfiguration::PATH_TO_DB);
            self::$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        }

        return self::$connection;
    }
}