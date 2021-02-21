<?php

require_once 'autoload.php';
require_once 'config/db.php';
require_once 'config/parameters.php';
require_once 'helpers/utils.php';

function show_error(){
    $error = new ErrorController();
    $error->index();
}


require_once 'views/layout/header.php';

if(isset($_GET['controller'])){
    $nombre_controlador = ucfirst($_GET['controller']).'Controller';
} elseif(!isset($_GET['controller']) && !isset($_GET['action'])){
    $nombre_controlador = DEFAULT_CONTROLLER;
} else {
    show_error();
}

if(class_exists($nombre_controlador)){
    $controlador = new $nombre_controlador();
    if(isset($_GET['action']) && method_exists($controlador,$_GET['action'])){
        $action = $_GET['action'];
        $controlador->$action();
    }elseif(!isset($_GET['controller']) && !isset($_GET['action'])){
        $default_action = DEFAULT_ACTION;
        $controlador->$default_action();
    } else {
        show_error();
    }
} else {
    show_error();
}

require_once 'views/layout/footer.php';