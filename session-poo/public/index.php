<?php
// Start the session
session_start();

// Setting error config
ini_set("ignore_repeated_errors", true);
ini_set("display_errors", true);
ini_set("log_errors", true);
ini_set("error_log", "../php-error.log");
error_reporting(E_ALL);
error_log("Hello, errors!");

// Setting composer autoload
require "../vendor/autoload.php";

// Routes
require "../src/Routes/web.php";
require "../src/Routes/api.php";
