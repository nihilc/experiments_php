<?php

namespace Nihilc\Test\Controller;

use Nihilc\Test\Model\User;
use Nihilc\Test\Model\View;

class UserController
{
  private View $view;
  private User $user;
  public function __construct()
  {
    $this->view = new View;
    $this->user = new User;
  }
  public function index()
  {
    $data['users'] = $this->user->readAll();
    $this->view->render('user/index', $data);
    if (isset($_GET['new'])) {
      $this->view->render(('user/new'));
    }
    if (isset($_GET['mod'])) {
      $userData = $this->user->readById($_GET['mod']);
      $this->view->render('user/mod', $userData);
    }
  }
  public function userIndex($value)
  {
    $data['user'] = $this->user->readById($value);
    $this->view->render('user/userIndex', $data);
  }
  public function userCreate($data){
    $this->user->setAllNoId($data);
    $this->user->create($this->user);
    header("Location: ../user");
  }
  public function userUpdate($data){
    $this->user->setAll($data);
    $this->user->update($this->user);
    header("Location: ../user");
  }
  public function userDelete($value){
    $this->user->deleteById($value);
    header("Location: ../../user");
  }
}