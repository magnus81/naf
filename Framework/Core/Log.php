<?php
namespace App\Framework\Core;

/**
 * Log
 *
 * @author Magnus <test@test.com>
 * @version 0.1
 */

class Log
{
	private static $path = '/opt/logs/';

	public static function info($msg)
	{
		if (is_array($msg)) $msg = print_r($msg, true);
		file_put_contents(self::$path . 'test.log', $msg . PHP_EOL, FILE_APPEND);
	}
}
