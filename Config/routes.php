<?php
use Framework\Framework\Core\Router;

Router::get('/', [
	'controller' => 'Pages',
	'func'       => 'home',
]);

Router::post('/', [
	'controller' => 'Pages',
	'func'       => 'postHome',
]);

Router::get('/test', [
	'controller' => 'Pages',
	'func'       => 'test'
]);
