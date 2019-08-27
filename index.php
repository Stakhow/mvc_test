<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

use core\Router;

spl_autoload_register(function ($class) {
	$path = __DIR__ . "/" . str_replace('\\', '/', $class . '.php');
	if(file_exists($path)) {
		require_once ($path);
	}
});

$router = new Router();
$router->run();




