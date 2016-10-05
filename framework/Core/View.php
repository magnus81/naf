<?php
namespace App\Framework\Core;

/**
 * View
 *
 * @author Magnus <test@test.com>
 * @version 0.1
 */

class View
{
	public static function render($view, $props = [])
	{
		return [
			BASE_PATH . '/views/' . $view . '.php',
			$props
		];
	}

}
