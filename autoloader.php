<?php

/**
 * Function autoloadVendor() looking for files in app directory.
 *
 * @param $class
 */
function autoloadApp($class)
{
    $root = 'app';
    createPathToFile($root, $class);
}

/**
 * Function autoloadVendor() looking for files in vendor directory.
 *
 * @param $class
 */
function autoloadVendor($class)
{
    $root = 'vendor';
    createPathToFile($root, $class);
}

function createPathToFile ($root, $class) {
    $corePath = $_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . $root;
    $class = str_replace('\\', DIRECTORY_SEPARATOR, $class);
    $file = $corePath . DIRECTORY_SEPARATOR . $class . '.php';
    @ include_once $file;
}

spl_autoload_register('autoloadApp');
spl_autoload_register('autoloadVendor');
