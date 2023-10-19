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


define('ROOT', str_replace('index.php', '', $_SERVER['SCRIPT_FILENAME']));
session_start();

if(isset($_GET['action']) && !empty($_GET['action'])){
    $params = explode("/", $_GET['action']);
    
    if($params[0] != ""){
        $controller = $params[0];
        $action = isset($params[1]) ? $params[1] : 'library';
        $controllerFile = ROOT . 'controllers/' . $controller . 'Controller.php';
        
        if(file_exists($controllerFile)){
            require_once($controllerFile);
            
            if(function_exists($action)){
                if(isset($params[2]) && isset($params[3])){
                    $action($params[2], $params[3]);
                } elseif (isset($params[2])) {
                    $action($params[2]);
                } else {
                    $action();
                }
            } else {
                header('HTTP/1.0 404 Not Found');
                require_once('views/errors/404.html');
            }
        } else {
            header('HTTP/1.0 404 Not Found');
            require_once('views/errors/404.html');
        }
    }
} else {
    require_once('controllers/FilmController.php');
    
    library();
}
