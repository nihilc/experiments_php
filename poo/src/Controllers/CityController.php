<?php

namespace Test\Poo\Controllers;

use Test\Poo\Libs\Controller;
use Test\Poo\Models\CityModel;

class CityController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    # Table of all
    public function index()
    {
        $model = new CityModel;
        $data = $model->readAll();
        $this->view->render('City/index', $data);
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
