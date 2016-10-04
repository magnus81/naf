<?php
namespace App\Framework\Core;

/**
 * DB
 *
 * @author Magnus <test@test.com>
 * @version 0.1
 */

/**
 * Basic db stuff, needs improvements
 */

class DB
{
	private static $instance = null;

	public function __init__()
	{
		if (is_null(self::$instance))
			self::$instance = new \mysqli('127.0.0.1', 'username', 'password', 'scheme') or die('Could not connect to db');
	}

	public static function query($q)
	{
		$result = self::$instance->query($q);

		if ($result->num_rows === 0)
			return false;

		return $result->fetch_assoc();
	}
}
