<?php

require "./vendor/autoload.php";

use Respect\Validation\Validator as v;

$vCityName = v::allOf(
  v::stringType(),
  v::notEmpty(),
  v::length(1, 100),
  v::regex("/^[a-zA-ZáéíóúÁÉÍÓÚ\s]+$/")
    ->setName("Nombre de la ciudad")
    ->setTemplate("{{name}} debe contener solo letras y espacios.")
);

try {
  $vCityName->assert("");
} catch (\Throwable $th) {
  $errors[] = $th->getMessage();
}

if (!empty($errors)) {
  echo "NO";
} else {
  echo "SI";
}
