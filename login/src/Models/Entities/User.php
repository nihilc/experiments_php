<?php

namespace Test\Login\Models\Entities;

use JsonSerializable;
use Serializable;

class User implements Serializable, JsonSerializable
{
    private int $id;
    private string $username;
    private string $password;
    private string $rol;

    // Serialization
    public function serialize()
    {
        return serialize([
            $this->id,
            $this->username,
            $this->password,
            $this->rol,
        ]);
    }
    public function unserialize(string $data)
    {
        list(
            $this->id,
            $this->username,
            $this->password,
            $this->rol,
        ) = unserialize($data);
    }
    public function jsonSerialize(): mixed
    {
        return get_object_vars($this);
    }

    // Setters
    public function setAll(
        int $id,
        string $username,
        string $password,
        string $rol
    ) {
        $this->id = $id;
        $this->username = $username;
        $this->password = $password;
        $this->rol = $rol;
    }
    public function setId(int $value)
    {
        $this->id = $value;
    }
    public function setUsername(string $value)
    {
        $this->username = $value;
    }
    public function setPassword(string $value)
    {
        $this->password = $value;
    }
    public function setRol(string $value)
    {
        $this->rol = $value;
    }

    // Getters
    public function getId()
    {
        return $this->id;
    }
    public function getUsername()
    {
        return $this->username;
    }
    public function getPassword()
    {
        return $this->password;
    }
    public function getRol()
    {
        return $this->rol;
    }
}
