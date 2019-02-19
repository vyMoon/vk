<?php
session_start();

spl_autoload_register(function ($class) {

    $dir = '../model/' . $class . '.php';
    if (file_exists($dir)) {
        require_once $dir;
    }
    
});

$controller = new Controller;
$controller->operations();
