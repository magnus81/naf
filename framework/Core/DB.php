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

		self::$instance->set_charset('latin1');
	}

	public static function query($q, $vals = [])
	{
		if (strpos($q, '?') !== false)
			$q = self::replace_first($vals, $q);

		$result = self::$instance->query($q);

		if (!$result || $result->num_rows === 0)
			return false;

		return $result->fetch_assoc();
	}

	public static function insert($q, $vals = [])
	{
		if (strpos($q, '?') !== false)
			$q = self::replace_first($vals, $q);

		$result = self::$instance->query($q);

		if (!$result || $result->num_rows === 0)
			return false;

		return self::$instance->insert_id;
	}

	public static function selectRow($q, $vals = [])
	{
		if (strpos($q, '?') !== false)
			$q = self::replace_first($vals, $q);

		$result = self::$instance->query($q);

		if (!$result || $result->num_rows === 0)
			return false;

		return $result->fetch_assoc();
	}

	public static function selectVal($q, $vals = [])
	{
		if (strpos($q, '?') !== false)
			$q = self::replace_first($vals, $q);

		$result = self::$instance->query($q);

		if (!$result || $result->num_rows === 0)
			return false;

		$arr = $result->fetch_assoc();

		return $arr[key($arr)];
	}

	public static function select($q, $vals = [])
	{
		if (strpos($q, '?') !== false)
			$q = self::replace_first($vals, $q);
		
		$result = self::$instance->query($q);

		if (!$result || $result->num_rows === 0)
			return false;

		$ret = [];

		while ($row = $result->fetch_assoc()) {
			$ret[] = $row;
		}

		return $ret;
	}

	private static function replace_first($vals, $subject)
	{
		$from = '/'.preg_quote('?', '/').'/';

		foreach ($vals as $s) {
			$subject = preg_replace($from, "'" . self::$instance->real_escape_string($s) . "'", $subject, 1);
		}

		return $subject;
	}
}
