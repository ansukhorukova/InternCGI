<?php
namespace Core;

use Controllers;

class Route
{
	public static function start()
	{
		// Controller and act by default
		$controllerName = 'Main';
		$actionName = 'Index';
		
		$routes = explode('/', $_SERVER['REQUEST_URI']);

		// Get name of controller
		if ( !empty($routes[1]) )
		{	
			$controllerName = $routes[1];
		}
		
		// Get name of action
		if ( !empty($routes[2]) )
		{
			$actionName = $routes[2];
		}

		// Add prefixes
		$modelName = $controllerName.'Model';
		$controllerName = $controllerName.'Controller';
		$actionName = 'action' . $actionName;

		// Connect model file

		$modelFile = $modelName . '.php';
		$modelPath = "app/Models/".$modelFile;
		if(file_exists($modelPath))
		{
			include "app/Models/".$modelFile;
		}

		// Connect controller file
		$controllerFile = $controllerName . '.php';
		$controllerPath = "app/Controllers/".$controllerFile;
		if(file_exists($controllerPath))
		{
			include "app/Controllers/" . $controllerFile;
		}
		else
		{
			/**
			 * TODO: Add exception and move to 404 page
			 */
			Route::_ErrorPage404();
		}
		
		// Create controller
		$controllerName = 'Controllers\\' . $controllerName;
		$controller = new $controllerName;
		$action = $actionName;
		
		if(method_exists($controller, $action))
		{
			// Call controller action
			$controller->$action();
		}
		else
		{
			/**
			 * TODO: Add exception and move to 404 page
			 */
			Route::_ErrorPage404();
		}
	
	}
	
	protected static function _ErrorPage404()
	{
        $host = 'http://'.$_SERVER['HTTP_HOST'].'/';
        header('HTTP/1.1 404 Not Found');
		header("Status: 404 Not Found");
		header('Location:'.$host.'404');
    }
}

