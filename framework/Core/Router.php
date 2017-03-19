<?php
namespace App\Framework\Core;

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

	/**
	 * Router::$aliases
	 *
	 * Holder for all user generated route aliases
	 * @var array
	 */
	private static $aliases;

	/**
	 * Router::$current_route
	 *
	 * Store current route
	 * @var string
	 */
	private static $current_route;

	/**
	 * Router::$current_alias
	 *
	 * Store current alias
	 * @var string
	 */
	private static $current_alias;

	/**
	 * Router::route();
	 * 
	 * Resolve route and return Controller::method
	 * @return
	 */
	public static function route()
	{
		// Set path to routes file
		self::$routes_path = BASE_PATH . '/Config/routes.php';

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
		$call       = $found['call'];
		$values     = (isset($found['values']) ? $found['values'] : []);

		if ($method === 'POST' || $method === 'GET') {
			Request::collect();
		}
		
		self::$current_route = $route;
		if (isset($found['alias']))
			self::$current_alias = $found['alias'];

		return call_user_func_array(['App\\Controllers\\' . $controller, $call], $values);
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
		/*
		$route = /forum/1
		/forum/{id}
		 */
		if (isset(self::$routes[$method][$route]))
			return self::$routes[$method][$route];

		// Need to check routes with variables
		// TODO: Move this
		$pattern = '/({\w+})/';
		foreach (self::$routes[$method] as $saved => $arr) {
			if (strpos($saved, '{') !== false && strpos($saved, '}') !== false) {
				$route_pattern = preg_replace($pattern, '([\w\d]+)', $saved);
				$route_pattern = '/^' . str_replace('/', '\/', $route_pattern) . '$/';

				preg_match($route_pattern, $route, $matches);
				
				if (isset($matches[0])) {
					array_shift($matches);
					self::$routes[$method][$saved]['values'] = $matches;
					return self::$routes[$method][$saved];
				}
			}
		}

		return false;
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

		$vars = self::checkRouteVariables($route);

		if ($vars !== false)
			self::$routes['GET'][$route]['variables'] = $vars;

		if (isset($props['alias']))
			self::addAlias($props['alias'], $route);
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

		if (isset($props['alias']))
			self::addAlias($props['alias'], $route);
	}

	/**
	 * Router::addAlias()
	 *
	 * Adds alias for route
	 * @param $alias
	 * @param $route
	 */
	private static function addAlias($alias, $route)
	{
		self::$aliases[$alias] = $route;
	}

	/**
	 * Router::getRouteForAlias()
	 *
	 * Match route with alias and return
	 * @param  $alias
	 * @return
	 */
	public static function getRouteForAlias($alias)
	{
		if (!isset(self::$aliases[$alias])) {
			throw new Exception('Error: route with alias ' . $alias . ' not found');
			die();
		}

		return self::$aliases[$alias];
	}

	/**
	 * Router::checkRouteVariables
	 *
	 * Check if route has any variables and return them
	 * @param  string $route
	 * @return array/bool
	 */
	private static function checkRouteVariables($route)
	{
		$pattern = '/{([\w]+)}/';
		preg_match_all($pattern, $route, $m);
		
		if (empty($m[1]))
			return false;

		return $m[1];
	}

	/**
	 * Router::getCurrentRoute
	 *
	 * Return current route
	 * @return string
	 */
	public static function getCurrentRoute()
	{
		return self::$current_route;
	}

	/**
	 * Router::getCurrentAlias
	 *
	 * Return current alias
	 * @return string
	 */
	public static function getCurrentAlias()
	{
		return self::$current_alias;
	}
}
