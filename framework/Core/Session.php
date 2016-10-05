<?php
namespace App\Framework\Core;

/**
 * View
 *
 * @author Magnus <test@test.com>
 * @version 0.1
 */

class Session
{
	private static $session = [];

	public function __init__()
	{
		if (empty(self::$session))
			self::$session = $_SESSION;
	}

	public static function has($key)
	{
		return isset(self::$session[$key]);
	}

	public static function get($key, $default = false)
	{
		return (isset(self::$session[$key]) ? self::$session[$key] : $default);
	}

	public static function set($key, $value)
	{
		self::$session[$key] = $value;
	}

	public static function all()
	{
		return self::$session;
	}
}