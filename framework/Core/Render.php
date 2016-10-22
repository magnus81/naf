<?php
namespace App\Framework\Core;

/**
 * Render
 *
 * @author Magnus <test@test.com>
 * @version 0.1
 */

class Render
{
	public static function response($data)
	{
		if ($data['type'] === 'view')
			self::view($data);

		self::json($data);
	}

	public static function view($data)
	{
		if (!empty($data['props'])) {
			foreach ($data['props'] as $name => $value) {
				${$name} = $value;
			}
		}

		include $data['view'];
	}

	public static function json($data)
	{
		echo $data['json'];
	}
}
