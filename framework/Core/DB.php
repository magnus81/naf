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
 * TODO:
 * 	move all credentials to config
 * 	add charset and stuff
 */

class DB
{
	private static $instance = null;

	public function __init__()
	{
		if (is_null(self::$instance))
				self::$instance = new \mysqli(
					Config::get('database.host'),
					Config::get('database.user'),
					Config::get('database.password'),
					Config::get('database.scheme')
				);

		if (self::$instance->connect_errno) {
			throw new Exception('DB connection error: ' . self::$instance->connect_error);
			die();
		}
	}

	public static function query($q, $foo)
	{
		$result = self::$instance->query($q);

		if (is_null($result) || $result->num_rows === 0)
			return false;

		return $result->fetch_assoc();
	}

	public static function selectRow($q)
	{
		$result = self::$instance->query($q);

		if (is_null($result) || $result->num_rows === 0)
			return false;

		return $result->fetch_assoc();
	}

	public static function selectVal($q)
	{
		$result = self::$instance->query($q);

		if (is_null($result) || $result->num_rows === 0)
			return false;

		$arr = $result->fetch_assoc();

		return $arr[key($arr)];
	}

	public static function select($q) 
	{
		$result = self::$instance->query($q);

		if (is_null($result) || $result->num_rows === 0)
			return false;

		$ret = [];

		while ($row = $result->fetch_assoc()) {
			$ret[] = $row;
		}

		return $ret;
	}
}
