<?php

namespace Test\Login\Libs;

class View
{
    public array $data;
    public function render(string $view, $data = [])
    {
        $this->data = $data;
        $path = "../src/Views/" . $view;
        if (file_exists($path . ".php")) {
            require $path . ".php";
            error_log("View: $view.php render");
            return;
        }
        if (file_exists($path . ".html")) {
            require $path . ".html";
            error_log("View: $view.html render");
            return;
        }
        error_log("View: $view no render");
    }
}
