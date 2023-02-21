<?php

namespace Test\Mvc\Model;

class View
{
    private array $d;
    public function render(string $view, array $data = [])
    {
        $this->d = $data;
        require 'src/View/' . $view . '.php';
    }
}
