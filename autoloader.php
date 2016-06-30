<?php

spl_autoload_register(function ($class)
{
    $corePath = $_SERVER['DOCUMENT_ROOT'];
    $class = str_replace('\\', DIRECTORY_SEPARATOR, $class);
    $file = $corePath . DIRECTORY_SEPARATOR . $class . '.php';
    require_once $file;
});