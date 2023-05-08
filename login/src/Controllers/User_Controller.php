<?php

namespace Test\Login\Controllers;

use Test\Login\Libs\Controller;
use Test\Login\Models\Entities\User;
use Test\Login\Models\User_Model;

class User_Controller extends Controller
{
    function __construct()
    {
        parent::__construct();
    }
    public function index(): void
    {
        parent::__construct();
        $this->data["users"] = User_Model::read();
        $this->render("User/index");

        if (isset($_GET["mod"])) {
            $this->data["user"] = User_Model::readById($_GET["mod"]);
            $this->render("User/form_mod");
        }
        if (isset($_GET["del"])) {
            $this->data["user"] = User_Model::readById($_GET["del"]);
            $this->render("User/form_del");
        }
    }
    public function add(array $data): void
    {
        if (User_Model::exists($data["username"])) {
            error_log("User_Controller::add() = Ya existe el Usuario");
            $_SESSION["mensaje"] = "Ya existe el Usuario";
            $this->redirect("../user");
        }

        $password_hashed = password_hash($data["password"], PASSWORD_DEFAULT, [
            "cost" => 10,
        ]);

        $user = new User();
        $user->setUsername($data["username"]);
        $user->setPassword($password_hashed);
        $user->setRol($data["rol"]);

        User_Model::create($user);
        $this->redirect("../user");
    }
    public function upd(array $data): void
    {
        if (User_Model::exists($data["username"])) {
            error_log("User_Controller::add() = Ya existe el Usuario");
            $_SESSION["mensaje"] = "Ya existe el Usuario";
            $this->redirect("../user");
        }

        $password_hashed = password_hash($data["password"], PASSWORD_DEFAULT, [
            "cost" => 10,
        ]);

        $user = new User();
        $user->setId($data["id"]);
        $user->setUsername($data["username"]);
        $user->setPassword($password_hashed);
        $user->setRol($data["rol"]);

        User_Model::update($user);
        $this->redirect("../user");
    }
    public function del(int $id): void
    {
        User_Model::delete($id);
        $this->redirect("../user");
    }
}
