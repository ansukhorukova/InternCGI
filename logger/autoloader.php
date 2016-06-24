<?php
use logger\core;
use logger\config;

spl_autoload_register(function ($class) {
    $corePath = $_SERVER['DOCUMENT_ROOT'];
    $class = str_replace('\\', '/', $class);
    $file = $corePath . '/' . $class . '.php';
    require_once $file;
});