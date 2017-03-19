<?php
namespace App\Framework\Core;

use App\Framework\Core\Router;

/**
 * App
 *
 * @author Magnus <test@test.com>
 * @version 0.1
 */

class App
{
	/**
	 * App:Run()
	 * 
	 * Run the application
	 */
	public static function run()
	{
		$res = Router::route();

		Render::response($res);
	}

	public static function close()
	{
		$_SESSION = array_merge($_SESSION, Session::all());
	}
}
