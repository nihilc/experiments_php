<?php

namespace Test\Poo\Libs;

class View
{
    public array $d;

    public function render(string $view, $data = [])
    {
        $this->d = $data;
        require "src/View/" . $view . ".php";
    }
}
