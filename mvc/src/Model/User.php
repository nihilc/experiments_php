<?php

namespace Test\Mvc\Model;

class User
{
    private string $name;
    private int $age;

    public function saludar()
    {
        return 'Hi ' . $this->name . ' you are ' . $this->age . ' years old';
    }
    public function setName(string $value)
    {
        $this->name = $value;
    }
    public function setAge(int $value)
    {
        $this->age = $value;
    }
    public function setAll(array $data)
    {
        $this->name = $data['name'];
        $this->age = $data['age'];
    }
    public function getName()
    {
        return $this->name;
    }
    public function getAge()
    {
        return $this->age;
    }
    public function getAll()
    {
        return [
            'name' => $this->name,
            'age' => $this->age
        ];
    }
}
