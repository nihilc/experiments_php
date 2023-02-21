<?php

namespace Test\Poo\Models\Entities;

class City
{
    private int $id;
    private string $name;

    # Setters
    public function setAll(array $data)
    {
        $this->id = $data['id'];
        $this->name = $data['name'];
    }
    public function setId(int $value)
    {
        $this->id = $value;
    }
    public function setName(int $value)
    {
        $this->name = $value;
    }

    # Getters
    public function getAll()
    {
        return [
            'id' => $this->id,
            'name' => $this->name
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
}
