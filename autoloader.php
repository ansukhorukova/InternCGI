<?php

spl_autoload_register(
/**
 * The function implements autoloading needed file,
 * when some object is called and require it.
 *
 * @param string $class.
 */
    function ($class)
{
    $corePath = $_SERVER['DOCUMENT_ROOT'];
    $class = str_replace('\\', DIRECTORY_SEPARATOR, $class);
    $file = $corePath . DIRECTORY_SEPARATOR . $class . '.php';
    require_once $file;
});