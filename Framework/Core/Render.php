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
	public static function view($view)
	{
		if (!empty($view[1])) {
			// We have som variables that has to be set
			foreach ($view[1] as $name => $value) {
				Log::info($name . ' => ' . $value);
				${$name} = $value;
			}

			Log::info('test is ' . $test);
		}

		include $view[0];
	}
}
