<?php

namespace Test\Poo\Libs;

class Controller
{
    protected View $view;

    public function __construct()
    {
        $this->view = new View;
    }
}
