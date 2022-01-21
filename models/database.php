<?php

namespace models;

use PDOException;
use PDO;

class Database
{
    private static $PDO;

    public static function getDatabaseInstance($host = "localhost", $username = "root", $password = "", $database_name = "e-commerce")
    {
        try {
            self::$PDO = new PDO("mysql:host=$host;dbname=$database_name", $username, $password);

            return self::$PDO;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        return null;
    }

    public  static function close()
    {
        self::$PDO = null;
    }
}
