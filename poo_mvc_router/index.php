<?php
// Setting error config
ini_set('ignore_repeated_errors', TRUE);
ini_set('display_errors', TRUE);
ini_set('log_errors', TRUE);
ini_set("error_log", "php-error.log");
error_reporting(E_ALL);
error_log("Hello, errors!");

echo "index";

require ('vendor/autoload.php');
require ('router.php');