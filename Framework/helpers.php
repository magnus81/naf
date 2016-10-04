<?php

function view($view, $props = []) {
	return App\Framework\Core\View::render($view, $props);
}

function route($alias)
{
	return App\Framework\Core\Router::getRouteForAlias($alias);
}
