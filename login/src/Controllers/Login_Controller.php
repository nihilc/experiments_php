<?php

namespace Test\Login\Controllers;

use Test\Login\Libs\Controller;
use Test\Login\Models\User_Model;

class Login_Controller extends Controller
{
    public function index(): void
    {
        if (isset($_SESSION["user"])) {
            header("Location: home");
            return;
        }
        $this->render("Login/index");
    }
    public function auth(array $data): void
    {
        if (!User_Model::exists($data["username"])) {
            error_log("Usuario o Contraseña Incorrectos");
            $_SESSION["mensaje"] = "Usuario o Contraseña Incorrectos";
            $this->redirect("login");
            return;
        }

        $user = User_Model::readByUsername($data["username"]);

        if (!password_verify($data["password"], $user->getPassword())) {
            error_log("Contraseña Incorrectos");
            $_SESSION["mensaje"] = "Contraseña Incorrectos";
            $this->redirect("login");
            return;
        }

        error_log("Usuario y Contraseña correctos");
        $_SESSION["user"] = serialize($user);
        $this->redirect("home");
        return;
    }
}
