<?php

use Bramus\Router\Router;
use Test\Session\Models\Entities\User;

$router = new Router();

$router->get("/login", function () {
    $user = new User(1, "nihil", "12345abcde", 3);
    $_SESSION["user"] = serialize($user);

    echo "Login Page:<br><a href=\"home\">Go Home</a><br>";
    echo "<pre>";
    print_r($_SESSION);
});
$router->get("/home", function () {
    echo "Home page:<br><a href=\"logout\">Go logout</a><br>";

    if (!isset($_SESSION["user"])) {
        echo "There is no user in session";
        return;
    }

    $user = unserialize($_SESSION["user"]);
    $user->saludar();
    echo "<pre>";
    print_r($_SESSION);
});
$router->get("/logout", function () {
    echo "Logout page: <br><a href=\"login\">Go login</a><br>";

    if (!isset($_SESSION["user"])) {
        echo "There is no user session to unset";
        return;
    }
    unset($_SESSION["user"]);
    echo "Session unset";
    echo "<pre>";
    print_r($_SESSION);
});

$router->run();
