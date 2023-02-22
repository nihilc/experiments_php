<?php

namespace Test\Poo\Models\Entities;

class Company
{
    private int    $id;
    private string $name;
    private string $info;
    private City   $city;

    # Setters
    public function setAll(array $data)
    {
        $this->id   = $data['id'];
        $this->name = $data['name'];
        $this->info = $data['desc'];
    }
    public function setId(int $value)
    {
        $this->id   = $value;
    }
    public function setName(string $value)
    {
        $this->name = $value;
    }
    public function setInfo(string $value)
    {
        $this->info = $value;
    }
    public function setCity(City $value)
    {
        $this->city = $value;
    }

    # Getters
    public function getAll()
    {
        return [
            'id'   => $this->id,
            'name' => $this->name,
            'desc' => $this->info,
            'city' => $this->city
        ];
    }
    public function getId()
    {
        return $this->id;
    }
    public function getName()
    {
        return $this->name;
    }
    public function getInfo()
    {
        return $this->info;
    }
    public function getCity()
    {
        return $this->city;
    }
}
