<?php
namespace App\Framework\Core;

/**
 * Config
 *
 * @author Magnus <test@test.com>
 * @version 0.1
 */

class Config
{
	private static $config = null;

	private static function loadConfig()
	{
		self::$config = require BASE_PATH . '/config/config.php';
	}

	public static function get($val, $default = null)
	{
		if (is_null(self::$config))
			self::loadConfig();

		$path = explode('.', $val);

		$set  = true;
		$test = self::$config;
		foreach ($path as $key) {
			if (isset($test[$key])) {
				$test = $test[$key];
			} else {
				$set = false;
			}
		}

		return ($set ? $test : $default);
	}
}
