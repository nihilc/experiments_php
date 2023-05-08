<?php

namespace Test\Login\Models;

use PDO;
use PDOException;
use Test\Login\Libs\Database;
use Test\Login\Models\Entities\User;

class User_Model
{
    public static function create(User $data): bool
    {
        try {
            $sql =
                "INSERT INTO users (username, password, rol) VALUES (?, ?, ?)";
            $stmt = Database::connect()->prepare($sql);
            $stmt->execute([
                $data->getUsername(),
                $data->getPassword(),
                $data->getRol(),
            ]);
            return true;
        } catch (PDOException $e) {
            error_log("User_Model::create() = " . print_r($e));
            return false;
        }
    }
    public static function update(User $data): bool
    {
        try {
            $sql =
                "UPDATE users SET username = ?, password = ?, rol = ? WHERE id = ?";
            $stmt = Database::connect()->prepare($sql);
            $stmt->execute([
                $data->getUsername(),
                $data->getPassword(),
                $data->getRol(),
                $data->getId(),
            ]);
            return true;
        } catch (PDOException $e) {
            error_log("User_Model::update() = " . print_r($e));
            return false;
        }
    }
    public static function delete(int $id): bool
    {
        try {
            $sql = "DELETE FROM users WHERE id = ?";
            $stmt = Database::connect()->prepare($sql);
            $stmt->execute([$id]);
            return true;
        } catch (PDOException $e) {
            error_log("User_Model::delete() = " . print_r($e));
            return false;
        }
    }
    public static function read(): array
    {
        try {
            $sql = "SELECT * FROM users";
            $stmt = Database::connect()->prepare($sql);
            $stmt->execute([]);
            $rows = $stmt->fetchAll(PDO::FETCH_OBJ);

            $users = [];
            foreach ($rows as $row) {
                $user = new User();
                $user->setAll(
                    $row->id,
                    $row->username,
                    $row->password,
                    $row->rol
                );
                $users[] = $user;
            }
            return $users;
        } catch (PDOException $e) {
            error_log("User_Model::read() = " . print_r($e));
            return false;
        }
    }
    public static function readById(int $id): User
    {
        try {
            $sql = "SELECT * FROM users WHERE id = ?";
            $stmt = Database::connect()->prepare($sql);
            $stmt->execute([$id]);
            $row = $stmt->fetch(PDO::FETCH_OBJ);

            $user = new User();
            $user->setAll($row->id, $row->username, $row->password, $row->rol);
            return $user;
        } catch (PDOException $e) {
            error_log("User_Model::read() = " . print_r($e));
            return false;
        }
    }
    public static function readByUsername(string $username): User
    {
        try {
            $sql = "SELECT * FROM users WHERE username = ?";
            $stmt = Database::connect()->prepare($sql);
            $stmt->execute([$username]);
            $row = $stmt->fetch(PDO::FETCH_OBJ);

            $user = new User();
            $user->setAll($row->id, $row->username, $row->password, $row->rol);
            return $user;
        } catch (PDOException $e) {
            print_r("$e");
            error_log("User_Model::readById() = " . print_r($e));
            return false;
        }
    }

    // others
    public static function exists(string $username): bool
    {
        try {
            $sql = "SELECT id FROM users WHERE username = ?";
            $stmt = Database::connect()->prepare($sql);
            $stmt->execute([$username]);

            if ($stmt->rowCount() > 0) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            error_log("User_Model::exists() = " . print_r($e));
            return false;
        }
    }
}
