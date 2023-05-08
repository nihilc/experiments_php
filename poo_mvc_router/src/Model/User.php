<?php

namespace Nihilc\Test\Model;

use PDO;
use PDOException;

class User
{
  // DB handler
  private Database $db;
  // Obj Properties
  private int $id;
  private string $fname;
  private string $lname;
  private string $user;
  private string $pass;
  public function __construct()
  {
    // Initialized DB 
    $this->db = new Database;
  }
  # Create
  public function create(User $data)
  {
    try {
      $sql = "INSERT INTO User (fname, lname, user, pass)
        VALUES (:fname, :lname, :user, :pass)";
      $stm = $this->db->connect()->prepare($sql);
      $stm->execute([
        'fname' => $data->fname,
        'lname' => $data->lname,
        'user' => $data->user,
        'pass' => $data->pass
      ]);
      return true;
    } catch (PDOException $e) {
      print_r("<pre>$e</pre>");
      return false;
    }
  }
  # Update
  public function update(User $data): bool
  {
    try {
      $sql = "UPDATE User SET fname = :fname, lname = :lname, user = :user, pass = :pass WHERE id = :id";
      $stm = $this->db->connect()->prepare($sql);
      $stm->execute([
        'id' => $data->id,
        'fname' => $data->fname,
        'lname' => $data->lname,
        'user' => $data->user,
        'pass' => $data->pass
      ]);
      return true;
    } catch (PDOException $e) {
      print_r("<pre>$e</pre>");
      return false;
    }
  }
  # Delete
  public function deleteById($value): bool
  {
    try {
      $sql = "DELETE FROM User WHERE id = ?";
      $stm = $this->db->connect()->prepare($sql);
      $stm->execute([$value]);
      return true;
    } catch (PDOException $e) {
      print_r("<pre>$e</pre>");
      return false;
    }
  }
  # Read by X
  public function readAll()
  {
    try {
      $sql = "SELECT * FROM User";
      $stm = $this->db->connect()->prepare($sql);
      $stm->execute();
      return $stm->fetchAll(PDO::FETCH_OBJ);
    } catch (PDOException $e) {
      print_r("<pre>$e</pre>");
      return false;
    }
  }
  public function readById(int $value)
  {
    try {
      $sql = "SELECT * FROM User WHERE id = ?";
      $stm = $this->db->connect()->prepare($sql);
      $stm->execute([$value]);
      return $stm->fetch(PDO::FETCH_OBJ);
    } catch (PDOException $e) {
      print_r("<pre>$e</pre>");
      return false;
    }
  }
  public function readByFname(string $value)
  {
    try {
      $sql = "SELECT * FROM User WHERE fname = ?";
      $stm = $this->db->connect()->prepare($sql);
      $stm->execute([$value]);
      return $stm->fetchAll(PDO::FETCH_OBJ);
    } catch (PDOException $e) {
      print_r("<pre>$e</pre>");
      return false;
    }
  }
  public function readByLname(string $value)
  {
    try {
      $sql = "SELECT * FROM User WHERE lname = ?";
      $stm = $this->db->connect()->prepare($sql);
      $stm->execute([$value]);
      return $stm->fetchAll(PDO::FETCH_OBJ);
    } catch (PDOException $e) {
      print_r("<pre>$e</pre>");
      return false;
    }
  }
  public function readByUser(string $value)
  {
    try {
      $sql = "SELECT * FROM User WHERE user = ?";
      $stm = $this->db->connect()->prepare($sql);
      $stm->execute([$value]);
      return $stm->fetchAll(PDO::FETCH_OBJ);
    } catch (PDOException $e) {
      print_r("<pre>$e</pre>");
      return false;
    }
  }
  public function readByPass(string $value)
  {
    try {
      $sql = "SELECT * FROM User WHERE pass = ?";
      $stm = $this->db->connect()->prepare($sql);
      $stm->execute([$value]);
      return $stm->fetchAll(PDO::FETCH_OBJ);
    } catch (PDOException $e) {
      print_r("<pre>$e</pre>");
      return false;
    }
  }

  # Setters
  public function setAll(array $data)
  {
    $this->id = $data['id'];
    $this->fname = $data['fname'];
    $this->lname = $data['lname'];
    $this->user = $data['user'];
    $this->pass = $data['pass'];
  }
  public function setAllNoId(array $data)
  {
    $this->fname = $data['fname'];
    $this->lname = $data['lname'];
    $this->user = $data['user'];
    $this->pass = $data['pass'];
  }
  public function setId($value)
  {
    $this->id = $value;
  }
  public function setFname($value)
  {
    $this->fname = $value;
  }
  public function setLname($value)
  {
    $this->lname = $value;
  }
  public function setUser($value)
  {
    $this->user = $value;
  }
  public function setPass($value)
  {
    $this->pass = $value;
  }

  # Getters
  public function getAll()
  {
    return [
      'id' => $this->id,
      'fname' => $this->fname,
      'lname' => $this->lname,
      'user' => $this->user,
      'pass' => $this->pass
    ];
  }
  public function getId()
  {
    return $this->id;
  }
  public function getFname()
  {
    return $this->fname;
  }
  public function getLname()
  {
    return $this->lname;
  }
  public function getUser()
  {
    return $this->user;
  }
  public function getPass()
  {
    return $this->pass;
  }
}