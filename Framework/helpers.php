<?php

function view($view, $props = []) {
	return Framework\Framework\Core\View::render($view, $props);
}

function route($alias)
{
	return Framework\Framework\Core\Router::getRouteForAlias($alias);
}
