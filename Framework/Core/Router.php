<?php
namespace Framework\Framework\Core;

/**
 * Router
 *
 * @author Magnus <test@test.com>
 * @version 0.1
 */

class Router
{
	/**
	 * Router::$routes_path
	 *
	 * Path to the routes fiel
	 * @var string
	 */
	private static $routes_path;

	/**
	 * Router::$routes
	 *
	 * Holder for all our routes
	 * @var array
	 */
	private static $routes;

	public static function route()
	{
		// Set path to routes file
		self::$routes_path = BASE_PATH . 'framework/Config/routes.php';

		// Collect all routes
		self::collectRoutes();
		
		// Where do we wanna go?
		// We might wanna split it with ? as well
		$route  = $_SERVER['REQUEST_URI'];
		$method = $_SERVER['REQUEST_METHOD'];

		// Check that route exists
		if (!($found = self::checkRoute($route, $method))) {
			throw new Exception('Error: route ' . $route . ' not found');
			die();
		}

		$controller = $found['controller'];
		$func       = $found['func'];

		if ($method === 'POST') {
			Request::collect();
		}

		return call_user_func_array(['Framework\\Controllers\\' . $controller, $func], []);
	}

	/**
	 * Router::checkRoute()
	 *
	 * Checks that reuested route exists
	 * @param  string $route
	 * @param  string $method
	 */
	private static function checkRoute($route, $method)
	{
		return (isset(self::$routes[$method][$route]) ? self::$routes[$method][$route] : false);
	}

	/**
	 * Router::collectRoutes()
	 *
	 * Collects all routes
	 */
	private static function collectRoutes()
	{
		include self::$routes_path;
	}

	/**
	 * Router::get()
	 *
	 * Save GET routes
	 * @param  string $route
	 * @param  array $prop
	 */
	public static function get($route, $props = null)
	{
		self::$routes['GET'][$route] = $props;
	}

	/**
	 * Router::post()
	 *
	 * Save POST routes
	 * @param  string $route
	 * @param  array $prop
	 */
	public static function post($route, $props = null)
	{
		self::$routes['POST'][$route] = $props;
	}
}