<?php

namespace Test\Mvc\Controller;

use Test\Mvc\Model\User;
use Test\Mvc\Model\View;

class UserController
{
    private User $user;
    private View $view;

    public function __construct()
    {
        $this->user = new User();
        $this->view = new View();
    }
    public function index()
    {
        if (isset($_POST['submit'])) {
            $this->user->setAll($_POST);
            $data['user'] = $this->user->getAll();
            $this->view->render('user/index', $data);
        } else {
            $this->view->render('user/index');
        }
    }
    public function indexUser()
    {
    }
}
