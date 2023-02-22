<?php

namespace Test\Poo\Models\Entities;

class User
{
    private int $id;
    private string $fname;
    private string $lname;
    private string $phone;
    private City $city;
    private Company $company;

    # Setters
    public function setAll(array $data)
    {
        $this->id = $data['id'];
        $this->fname = $data['fname'];
        $this->lname = $data['lname'];
        $this->phone = $data['phone'];
        $this->city = $data['city'];
        $this->company = $data['company'];
    }
    public function setId(int $value)
    {
        $this->id = $value;
    }
    public function setFname(string $value)
    {
        $this->fname = $value;
    }
    public function setLname(string $value)
    {
        $this->lname = $value;
    }
    public function setPhone(string $value)
    {
        $this->phone = $value;
    }
    public function setCity(City $value)
    {
        $this->city = $value;
    }
    public function setCompany(Company $value)
    {
        $this->company = $value;
    }

    # Getters
    public function getAll()
    {
        return [
            'id' => $this->id,
            'fname' => $this->fname,
            'lname' => $this->lname,
            'phone' => $this->phone,
            'city' => $this->city
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
    public function getPhone()
    {
        return $this->phone;
    }
    public function getCity()
    {
        return $this->city;
    }
    public function getCompany()
    {
        return $this->company;
    }
}
