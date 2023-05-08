<?php

namespace Test\Login\Libs;

use Error;
use PDO;
use PDOException;

class Database
{
    public static function connect()
    {
        $host = "localhost";
        $dbname = "test";
        $charset = "utf8mb4";
        $username = "root";
        $password = "";
        try {
            $dns =
                "mysql:host=" .
                $host .
                ";dbname=" .
                $dbname .
                ";charset=" .
                $charset;
            $opt = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];
            $dbh = new PDO($dns, $username, $password, $opt);
            return $dbh;
        } catch (PDOException $e) {
            error_log("Error connection: " . print_r($e));
        }
    }
}
