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
		switch ($data['type']) {
			case 'view':
				self::view($data);
				break;
			case 'json':
				self::json($data);
				break;
		}
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
		echo json_encode($data['json'], JSON_FORCE_OBJECT);
	}
}
