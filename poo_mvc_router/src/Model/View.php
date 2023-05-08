<?php

namespace Nihilc\Test\Model;

class View
{
  public $d;
  public function render(string $view, $data = [])
  {
    $this->d = $data;
    require "src/View/" . $view . ".php";
  }
}