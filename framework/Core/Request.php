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

	private static $is_ajax = false;

	public static function collect()
	{
		self::$values = $_REQUEST;
		
		if (isset(self::$values['HTTP_X_REQUESTED_WITH']) && self::$values['HTTP_X_REQUESTED_WITH'] === 'XMLHttpRequest')
			self::$is_ajax = true;
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
