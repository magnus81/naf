<?php
namespace Framework\Framework\Core;

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
			BASE_PATH . 'framework/views/' . $view . '.php',
			$props
		];
	}

	// Maybe this should not be here but we'll let it be for now
	public static function redirect($alias)
	{
		$uri = Router::getRouteForAlias($alias);
		header('Location: ' . $uri);
	}
}
