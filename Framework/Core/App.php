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
		/*
		What to do here
		- Setup configs maybe
		- Route
		- Request
		 */
		
		$res = Router::route();

		Render::view($res);
	}
}
