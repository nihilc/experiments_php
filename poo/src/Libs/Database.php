<?php

namespace Test\Poo\Libs;

use PDO;
use PDOException;

class Database
{
    private string $host;
    private string $charset;
    private string $username;
    private string $password;
    private string $db;

    public function __construct()
    {
        $this->host = 'localhost';
        $this->charset = 'utf8mb4';
        $this->username = 'root';
        $this->password = '';
        $this->db = 'test';
    }
    public function connect()
    {
        try {
            $dsn = "mysql:host=" . $this->host . ";dbname=" . $this->db . ";charset=" . $this->charset;
            $opt = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];
            $dbh = new PDO($dsn, $this->username, $this->password, $opt);
            return $dbh;
        } catch (PDOException $e) {
            print_r("Error connection: $e");
        }
    }
}
