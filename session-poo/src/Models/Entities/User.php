<?php

namespace Test\Session\Models\Entities;

use JsonSerializable;
use Serializable;

class User implements Serializable, JsonSerializable
{
    public function __construct(
        private int $id,
        private string $username,
        private string $password,
        private int $rol
    ) {
    }
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

    public function saludar(): void
    {
        echo "Hi " .
            $this->id .
            " " .
            $this->username .
            " your password is = " .
            $this->password .
            " and rol = " .
            $this->rol;
    }
}
