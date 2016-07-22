<?php

ini_set('display_errors', 1);

require_once __DIR__ . '/vendor/Autoloader.php';
require_once __DIR__ . '/app/Bootstrap.php';

use Core\Route;


/**
 * Start application.
 */
Route::start(); // Starting the route
