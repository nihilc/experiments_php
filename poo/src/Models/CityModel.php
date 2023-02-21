<?php

namespace Test\Poo\Models;

use PDO;
use PDOException;
use Test\Poo\Libs\Model;
use Test\Poo\Models\Entities\City;

class CityModel extends Model
{
    public function __construct()
    {
        parent::__construct();
    }
    # Create
    public function create(City $entity)
    {
        try {
            $sql = "INSERT INTO Cities (name) VALUES (?)";
            $stm = $this->db->connect()->prepare($sql);
            $stm->execute([
                $entity->getName()
            ]);
            return true;
        } catch (PDOException $e) {
            print_r("<pre>$e</pre>");
            return false;
        }
    }
    # Update
    public function update(City $entity)
    {
        try {
            $sql = "UPDATE Cities SET name = ? WHERE id = ?";
            $stm = $this->db->connect()->prepare($sql);
            $stm->execute([
                $entity->getName(),
                $entity->getId()
            ]);
            return;
        } catch (PDOException $e) {
            print_r("<pre>$e</pre>");
            return false;
        }
    }
    # Delete
    public function delete(int $id)
    {
        try {
            $sql = "DELETE FROM Cities WHERE id = ?";
            $stm = $this->db->connect()->prepare($sql);
            $stm->execute([
                $id
            ]);
            return true;
        } catch (PDOException $e) {
            print_r("<pre>$e</pre>");
            return false;
        }
    }
    # Read
    public function readAll()
    {
        try {
            // Getting Cities from database
            $sql = "SELECT * FROM Cities";
            $stm = $this->db->connect()->prepare($sql);
            $stm->execute([]);
            $rows = $stm->fetchAll(PDO::FETCH_OBJ);

            // Creating array of City Entities
            foreach ($rows as $row) {
                $entity = new City;
                $entity->setAll([
                    $row->id,
                    $row->name
                ]);
                $data[] = $entity;
            }

            return $data;
        } catch (PDOException $e) {
            print_r("<pre>$e</pre>");
            return false;
        }
    }
    public function readById(int $id)
    {
        try {
            // Getting City from database
            $sql = "SELECT * FROM Cities WHERE id = ?";
            $stm = $this->db->connect()->prepare($sql);
            $stm->execute([$id]);
            $row = $stm->fetch(PDO::FETCH_OBJ);

            // Creating City Entity
            $entity = new City;
            $entity->setAll([
                $row->id,
                $row->name
            ]);

            return $entity;
        } catch (PDOException $e) {
            print_r("<pre>$e</pre>");
            return false;
        }
    }
}
