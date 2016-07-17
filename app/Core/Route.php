<?php
namespace Core;


class Route
{
	/**
	 * Start routing
     */
	public static function start()
	{
		session_start();
		/**
		 * Controller and act by default
		 */
		$controllerName = 'main';
		$actionName = 'index';

		if($_SERVER['REQUEST_URI'] == '/favicon.ico') {
			$controllerName = 'main';
			$actionName = 'index';
		} else {

			$routes = self::_multiExplode(array("/","?"), $_SERVER['REQUEST_URI']);

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
		$controllerName = ucfirst($controllerName) . 'Controller';
		$actionName = 'action' . ucfirst($actionName);

		/**
		 * Connect controller file
		 */
		$controllerPath = "app/Controllers/" . $controllerName . '.php';

		try {
			if(file_exists($controllerPath)) {
				/**
				 * Create controller
				 */
				$controllerName = 'Controllers\\' . $controllerName;
				$controller = new $controllerName;
				$action = $actionName;

				if(!method_exists($controller, $action))
				{
					$action = 'actionIndex';
				}
				/**
				 * Call controller action
				 */
				$controller->$action();
			} else {
				throw new \Exception();
				}
		} catch (\Exception $e) {
			Route::_ErrorPage404();
		}
	}

	/**
	 * The method _multiExplode() implements function explode for multi delimiters
	 *
	 * @param array $delimiters
	 * @param string $string
	 * @return array $launch
     */
	protected static function _multiExplode ($delimiters, $string)
	{

		$ready = str_replace($delimiters, $delimiters[0], $string);
		$launch = explode($delimiters[0], $ready);
		return  $launch;
	}

	/**
	 * Get 404 error page
     */
	protected static function _ErrorPage404()
	{
        $host = 'http://'.$_SERVER['HTTP_HOST'].'/';
        header('HTTP/1.1 404 Not Found');
		header("Status: 404 Not Found");
		header('Location:'.$host.'Page404');
    }
}

