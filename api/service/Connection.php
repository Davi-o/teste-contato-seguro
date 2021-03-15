<?php

namespace Service;

use Connection\DatabaseConfiguration;
use PDO;

class Connection extends PDO
{
    protected static PDO $connection;

    public function __construct($dsn, $username = null, $password = null, $options = null)
    {
        parent::__construct($dsn, $username, $password, $options);
    }

    public static function connect(): PDO
    {
        if (! isset(self::$connection)) {
            self::$connection = new Connection("sqlite:".DatabaseConfiguration::PATH_TO_DB);
            self::$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        }

        return self::$connection;
    }
}