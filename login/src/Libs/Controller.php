<?php

namespace Test\Login\Libs;

use PDO;

class Controller
{
    protected View $view;
    public array $data;

    public function __construct()
    {
        $this->view = new View();
    }

    public function render(string $view): void
    {
        if (!empty($this->data)) {
            $this->view->render($view, $this->data);
        } else {
            $this->view->render($view);
        }
    }
    public function redirect(string $route): void
    {
        header("Location: $route");
    }
}
