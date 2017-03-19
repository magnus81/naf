<?php
namespace App\Framework\Core;

/**
 * Response
 *
 * @author Magnus <test@test.com>
 * @version 0.1
 */

class Response
{
	public static function redirect($alias, $values = [])
	{
		// /forum/{id}/{thread}
		$uri = Router::getRouteForAlias($alias);
		
		$pattern = '/({\w+})/';
		foreach ($values as $val) {
			$uri = preg_replace($pattern, $val, $uri, 1);
		}

		header('Location: ' . $uri);
	}

	public static function json($arr)
	{
		return [
			'type' => 'json',
			'json' => $arr
		];
	}
}
