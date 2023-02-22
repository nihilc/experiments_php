<?php

namespace Test\Poo\Models;

use PDO;
use PDOException;
use Test\Poo\Libs\Model;
use Test\Poo\Models\Entities\City;
use Test\Poo\Models\Entities\Company;
use Test\Poo\Models\Entities\User;

class UserModel extends Model
{
    public function __construct()
    {
        parent::__construct();
    }
    # Create
    public function create(User $user)
    {
        try {
            $sql = "INSERT INTO Users (fname, lname, phone, city_id, company_id) VALUES (?, ?, ?, ?, ?)";
            $stm = $this->db->connect()->prepare($sql);
            $stm->execute([
                $user->getFname(),
                $user->getLname(),
                $user->getPhone(),
                $user->getCity()->getId(),
                $user->getCompany()->getId()
            ]);
            return true;
        } catch (PDOException $e) {
            print_r("<pre>$e</pre>");
            return false;
        }
    }
    # Update
    public function update(User $user)
    {
        try {
            $sql = "UPDATE Users SET fname = ?, lname = ?, phone = ?, city_id = ?, company_id = ? WHERE id = ?";
            $stm = $this->db->connect()->prepare($sql);
            $stm->execute([
                $user->getFname(),
                $user->getLname(),
                $user->getPhone(),
                $user->getCity()->getId(),
                $user->getCompany()->getId(),
                $user->getId()
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
            $sql = "DELETE FROM Users WHERE id = ?";
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
            // Get Users data from database
            $sql = "SELECT u.*, ci.name AS city_name, co.name AS company_name, co.info AS company_info, co.city_id AS company_city_id, co_ci.name AS company_city_name
            FROM Users u
            JOIN Cities ci ON u.city_id = ci.id
            JOIN Companies co ON u.company_id = co.id
            JOIN Cities co_ci ON co.city_id = co_ci.id";
            $stm = $this->db->connect()->prepare($sql);
            $stm->execute([]);
            $rows = $stm->fetchAll(PDO::FETCH_OBJ);

            // Create User entities
            foreach ($rows as $row) {
                $user = new User;
                $user->setId($row->id);
                $user->setFname($row->fname);
                $user->setLname($row->lname);
                $user->setPhone($row->phone);

                $user_city = new City;
                $user_city->setId($row->city_id);
                $user_city->setName($row->city_name);
                $user->setCity($user_city); // assign city to user

                $user_company = new Company;
                $user_company->setId($row->company_id);
                $user_company->setName($row->company_name);
                $user_company->setInfo($row->company_info);

                // i don't need to create a new city entity i can use the 'user_city'
                // and assign to it the information to save it in the company but
                // i'll do it like this to be descriptive
                $user_company_city = new City;
                $user_company_city->setId($row->company_city_id);
                $user_company_city->setName($row->company_city_name);
                $user_company->setCity($user_company_city); // assign city to company

                $user->setCompany($user_company); // assign company to user

                $users[] = $user; // add user to array
            }
            return $users;
        } catch (PDOException $e) {
            print_r("<pre>$e</pre>");
            return false;
        }
    }
    public function readById(int $id)
    {
        try {
            // Get user data from db
            $sql = "SELECT u.*, ci.name AS city_name, co.name AS company_name, co.info AS company_info, co.city_id AS company_city_id, co_ci.name AS company_city_name
            FROM Users u
            JOIN Cities ci ON u.city_id = ci.id
            JOIN Companies co ON u.company_id = co.id
            JOIN Cities co_ci ON co.city_id = co_ci.id
            WHERE u.id = ?";
            $stm = $this->db->connect()->prepare($sql);
            $stm->execute([]);
            $row = $stm->fetch(PDO::FETCH_OBJ);

            // Create User entity
            $user = new User;
            $user->setId($row->id);
            $user->setFname($row->fname);
            $user->setLname($row->lname);
            $user->setPhone($row->phone);

            // create city entity for user
            $city = new City;
            $city->setId($row->city_id);
            $city->setName($row->city_name);
            $user->setCity($city); // assign city to user

            // create company entity for user
            $company = new Company;
            $company->setId($row->company_id);
            $company->setName($row->company_name);
            $company->setInfo($row->company_info);
            // reutilize city entity for company
            $city->setId($row->company_city_id);
            $city->setName($row->company_city_name);
            $company->setCity($city); // assign city to company

            $user->setCompany($company); // assign company to user

            return $user;
        } catch (PDOException $e) {
            print_r("<pre>$e</pre>");
            return false;
        }
    }
}
