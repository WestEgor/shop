<?php

namespace config;

use PDO;

/**
 * Class Connector
 * Class for get connection from database using PDO
 * @package config
 */
class Connector
{
    /**
     * database user
     */
    private const USER = 'postgres';

    /**
     * database password
     */
    private const PASSWORD = 'root';

    /**
     * Connection instance
     */
    private static $connection;

    /**
     * Private Connector constructor
     * Cannot call in others classes to avoid unnecessary connections
     */
    private function __construct()
    {
    }

    /**
     * Method to connect to database and return PDO object
     * @return PDO
     */
    public
    function getConnect(): PDO
    {
        $conn = 'pgsql:dbname=postgres;host=127.0.0.1;port=5432';
        $user = self::USER;
        $password = self::PASSWORD;
        $pdoConnect = new PDO($conn, $user, $password);
        $pdoConnect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdoConnect;
    }


    /**
     * Create instance of Connector
     * @return Connector
     */
    public
    static function get(): Connector
    {
        if (static::$connection === null) {
            static::$connection = new static();
        }

        return static::$connection;
    }

}