<?php

use Test\Mvc\Controller\UserController;

require 'vendor/autoload.php';

$c = new UserController;
$c->index();
