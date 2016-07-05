<?php

/**
 * Function autoloadVendor() looking for files in app directory.
 *
 * @param string $class. Name of the desired class.
 */
function autoloadApp($class)
{
    $root = 'app' . DIRECTORY_SEPARATOR . 'code' . DIRECTORY_SEPARATOR
            . 'local' . DIRECTORY_SEPARATOR . 'spet';
    createPathToFile($root, $class);
}

/**
 * Function autoloadVendor() looking for files in vendor directory.
 *
 * @param string $class. Name of the desired class.
 */
function autoloadVendor($class)
{
    $root = 'vendor';
    createPathToFile($root, $class);
}

/**
 * Function createPathToFile() creates path to look file.
 *
 * @param string $root. Name of root directory.
 * @param string $class. Name of the desired class.
 */
function createPathToFile ($root, $class) {
    $corePath = $_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . $root;
    $class = str_replace('\\', DIRECTORY_SEPARATOR, $class);
    $file = $corePath . DIRECTORY_SEPARATOR . $class . '.php';
    @ include_once $file;
}

spl_autoload_register('autoloadApp');
spl_autoload_register('autoloadVendor');
