<?php
namespace Core;


class Route
{
	public static function start()
	{
		session_start();
		/**
		 * Controller and act by default
		 */
		$controllerName = 'Main';
		$actionName = 'Index';

		if($_SERVER['REQUEST_URI'] == '/favicon.ico') {
			$controllerName = 'Main';
			$actionName = 'Index';
		} else {
			function multiexplode ($delimiters,$string) {

				$ready = str_replace($delimiters, $delimiters[0], $string);
				$launch = explode($delimiters[0], $ready);
				return  $launch;
			}

			$routes = multiexplode(array("/","?"), $_SERVER['REQUEST_URI']);

			/**
			 * Get name of controller
			 */
			if ( !empty($routes[1]) )
			{
				$controllerName = $routes[1];
			}

			/**
			 * Get name of action
			 */
			if ( !empty($routes[2]) )
			{
				$actionName = $routes[2];
			}

			/**
			 * Add GET data
			 */
			if ( !empty($routes[3]) )
			{
				$routes[2] = $routes[2] . $routes[3];
			}
		}


		/**
		 * Add prefixes
		 */
		$controllerName = $controllerName.'Controller';
		$actionName = 'action' . $actionName;

		/**
		 * Connect controller file
		 */
		$controllerFile = $controllerName . '.php';
		$controllerPath = "app/Controllers/".$controllerFile;
		if(file_exists($controllerPath))
		{
			/**
			 * Create controller
			 */
			$controllerName = 'Controllers\\' . $controllerName;
			$controller = new $controllerName;
			$action = $actionName;

			if(method_exists($controller, $action))
			{
				/**
				 * Call controller action
				 */
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
		header('Location:'.$host.'Page404');
    }
}

