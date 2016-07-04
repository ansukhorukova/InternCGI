<?php

/**
 * Function autoloadVendor() looking for files in app directory.
 *
 * @param $class
 */
function autoloadApp($class)
{
    $corePath = $_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . 'app';
    $class = str_replace('\\', DIRECTORY_SEPARATOR, $class);
    $file = $corePath . DIRECTORY_SEPARATOR . $class . '.php';
    @ include_once $file;
}

/**
 * Function autoloadVendor() looking for files in vendor directory.
 *
 * @param $class
 */
function autoloadVendor($class)
{
    $corePath = $_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . 'vendor';
    $class = str_replace('\\', DIRECTORY_SEPARATOR, $class);
    $file = $corePath . DIRECTORY_SEPARATOR . $class . '.php';
    @ include_once $file;
}

spl_autoload_register('autoloadApp');
spl_autoload_register('autoloadVendor');
