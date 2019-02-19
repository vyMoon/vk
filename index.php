<?php

session_start(); 

spl_autoload_register(function ($class) {  // подключение классов
    $dir = 'model/' . $class . '.php';
    if (file_exists($dir)) {
        require_once $dir;
    }
});

$config = new Config;
$link = $config->link;

$index = new Index($link);
$index->display();
