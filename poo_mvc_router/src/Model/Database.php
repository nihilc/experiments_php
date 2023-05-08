<?php

namespace Nihilc\Test\Model;

use PDO;
use PDOException;

class Database
{
  private string $charset;
  private string $host;
  private string $user;
  private string $pass;
  private string $db;
  public function __construct()
  {
    $this->charset = "utf8mb4";
    $this->host = "localhost";
    $this->user = "root";
    $this->pass = "";
    $this->db = "test";
  }
  public function connect()
  {
    try {
      $dns = "mysql:host=" . $this->host . ";dbname=" . $this->db . ";charset=" . $this->charset;
      $opt = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];
      $dbh = new PDO($dns, $this->user, $this->pass, $opt);
      return $dbh;
    } catch (PDOException $e) {
      print_r("Error connection: <pre>$e</pre>");
    }
  }
}