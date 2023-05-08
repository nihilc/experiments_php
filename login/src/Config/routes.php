<?php

use Bramus\Router\Router;
use Test\Login\Controllers\Login_Controller;
use Test\Login\Controllers\User_Controller;

$router = new Router();

$router->get("/", function () {
    echo "Hola";
});

$router->get("/login", function () {
    $c = new Login_Controller();
    $c->index();
});
$router->post("/auth", function () {
    $c = new Login_Controller();
    $c->auth($_POST);
});

$router->get("/logout", function () {
    unset($_SESSION["user"]);
    header("Location: login");
});

$router->get("/home", function () {
    $user = unserialize($_SESSION["user"]);
    echo "Home<pre>";
    print_r($user);
    echo "</pre>";
    echo "<a href='logout'>Logout</a>";
});

$router->mount("/user", function () use ($router) {
    $c = new User_Controller();
    $router->get("/", function () use ($c) {
        $c->index();
    });
    $router->post("/add", function () use ($c) {
        $c->add($_POST);
    });
    $router->post("/upd", function () use ($c) {
        $c->upd($_POST);
    });
    $router->post("/del", function () use ($c) {
        $c->del($_POST["id"]);
    });
});

$router->run();
