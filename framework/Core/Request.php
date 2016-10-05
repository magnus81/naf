<?php
namespace App\Framework\Core;

/**
 * Request
 *
 * @author Magnus <test@test.com>
 * @version 0.1
 */

class Request
{
	private static $values;

	public static function collect()
	{
		self::$values = $_REQUEST;
	}

	public static function all()
	{
		return self::$values;
	}

	public static function has($prop)
	{
		return isset(self::$values[$prop]);
	}

	public static function get($prop, $default = false)
	{
		return isset(self::$values[$prop]) ? self::$values[$prop] : $default;
	}

}
