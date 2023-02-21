<?php

namespace Test\Poo\Libs;

class Model
{
    protected Database $db;

    public function __construct()
    {
        $this->db = new Database;
    }
}
