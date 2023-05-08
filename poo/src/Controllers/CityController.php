<?php

namespace Test\Poo\Controllers;

use Test\Poo\Libs\Controller;
use Test\Poo\Models\CityModel;

class CityController extends Controller
{
    private CityModel $model;
    public function __construct()
    {
        $this->model = new CityModel;
        parent::__construct();
    }
    # Table of all
    public function index()
    {
        $data = $this->model->read();
        $this->view->render('Layout/header', $data);
        $this->view->render('City/index', $data);

        $_GET['new'] ? $this->new() : null;
        $_GET['mod'] ? $this->mod() : null;

        $this->view->render('Layout/footer', $data);
    }
    # Forms to add and modify
    public function new()
    {
    }
    public function mod()
    {
    }
    # Call to the model and save to the database
    public function add()
    {
    }
    public function upd()
    {
    }
    public function del()
    {
    }
}
