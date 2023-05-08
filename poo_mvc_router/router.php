<?php

use Bramus\Router\Router;
use Nihilc\Test\Controller\UserController;

$router = new Router;

$router->get('/aaa', function () {
  echo "hola";
});

$router->mount('/user', function () use ($router) {
  $router->get('/', function () {
    $c = new UserController;
    $c->index();
  });
  $router->post('/add', function () {
    $c = new UserController;
    $c->userCreate($_POST);
  });
  $router->get('/(\d+)', function ($value) {
    $c = new UserController;
    $c->userIndex($value);
  });
  $router->post('/(\d+)/upd', function () {
    $c = new UserController;
    $c->userUpdate($_POST);
  });
  $router->get('/(\d+)/del', function ($value) {
    $c = new UserController;
    $c->userDelete($value);
  });
});

$router->run();