<?php

function view($view, $props = []) 
{
	return App\Framework\Core\View::render($view, $props);
}

function route($alias)
{
	return App\Framework\Core\Router::getRouteForAlias($alias);
}

function include_view($view, $data = [])
{
	if (!empty($data)) {
		foreach ($data as $name => $value) {
			${$name} = $value;
		}
	}

	return include VIEW_PATH . $view;
}

function lg($msg = '')
{
	App\Framework\Core\Log::info($msg);
}

function currrent_route()
{
	return App\Framework\Core\Router::getCurrentRoute();
}

function currrent_alias()
{
	return App\Framework\Core\Router::getCurrentAlias();
}
