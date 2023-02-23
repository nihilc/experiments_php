<?php

namespace Test\Poo\Models;

use PDO;
use PDOException;
use Test\Poo\Libs\Model;
use Test\Poo\Models\Entities\City;
use Test\Poo\Models\Entities\Company;

class CompanyModel extends Model
{
    public function __construct()
    {
        parent::__construct();
    }
    # Create
    public function create(Company $company)
    {
        try {
            $sql = "INSERT INTO Companies (name, info, city_id) VALUES (?, ?, ?)";
            $stm = $this->db->connect()->prepare($sql);
            $stm->execute([
                $company->getName(),
                $company->getInfo(),
                $company->getCity()->getId()
            ]);
            return true;
        } catch (PDOException $e) {
            print_r("<pre>$e</pre>");
            return false;
        }
    }
    # Update
    public function update(Company $company)
    {
        try {
            $sql = "UPDATE Companies SET name = ?, info = ?, city_id = ? WHERE id = ?";
            $stm = $this->db->connect()->prepare($sql);
            $stm->execute([
                $company->getName(),
                $company->getInfo(),
                $company->getCity()->getId(),
                $company->getId()
            ]);
            return true;
        } catch (PDOException $e) {
            print_r("<pre>$e</pre>");
            return false;
        }
    }
    # Delete
    public function delete(int $id)
    {
        try {
            $sql = "DELETE FROM Companies WHERE id = ?";
            $stm = $this->db->connect()->prepare($sql);
            $stm->execute([$id]);
            return true;
        } catch (PDOException $e) {
            print_r("<pre>$e</pre>");
            return false;
        }
    }
    # Read
    public function read()
    {
        try {
            // Getting Companies from database
            $sql = "SELECT co.*, ci.name AS city_name 
                FROM Companies co
                JOIN Cities ci ON co.city_id = ci.id
                ORDER BY co.id";
            $stm = $this->db->connect()->prepare($sql);
            $stm->execute([]);
            $rows = $stm->fetchAll(PDO::FETCH_OBJ);

            // Creating array of Company entities
            foreach ($rows as $row) {
                $company = new Company;
                $company->setId($row->id);
                $company->setName($row->name);
                $company->setInfo($row->info);

                $city = new City;
                $city->setId($row->city_id);
                $city->setName($row->city_name);
                $company->setCity($city); // assign city yo company

                $companies[] = $company; // add company to array
            }
            return $companies;
        } catch (PDOException $e) {
            print_r("<pre>$e</pre>");
            return false;
        }
    }
    public function readById(int $id)
    {
        try {
            // Getting Companies from database
            $sql = "SELECT co.*, ci.name AS city_name 
                FROM Companies co
                JOIN Cities ci ON co.city_id = ci.id
                WHERE co.id = ?";
            $stm = $this->db->connect()->prepare($sql);
            $stm->execute([$id]);
            $row = $stm->fetch(PDO::FETCH_OBJ);

            // Creating array of Company entities
            $company = new Company;
            $company->setId($row->id);
            $company->setName($row->name);
            $company->setInfo($row->info);

            $city = new City;
            $city->setId($row->city_id);
            $city->setName($row->city_name);
            $company->setCity($city);

            return $company;
        } catch (PDOException $e) {
            print_r("<pre>$e</pre>");
            return false;
        }
    }
}
