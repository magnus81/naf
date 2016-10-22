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
	public static function redirect($alias)
	{
		$uri = Router::getRouteForAlias($alias);
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
