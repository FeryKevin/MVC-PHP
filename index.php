<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once 'controllers/FilmController.php';
require_once 'controllers/UserController.php';

session_start();

$funcName = substr($_SERVER['REQUEST_URI'], 1);
$funcName = explode('?', $funcName)[0];

if($funcName === ""){
    $funcName = 'login';
}

if (function_exists($funcName)){
    $funcName(...$_GET);

    exit(0);
} else {    
    die('404');
}
