<?php

namespace config;

use PDO;

class Connector
{
    private const USER = 'postgres';
    private const PASSWORD = 'root';
    private static $connection;


    private function __construct()
    {
    }

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

    public
    static function get()
    {
        if (static::$connection === null) {
            static::$connection = new static();
        }

        return static::$connection;
    }

}