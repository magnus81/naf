<?php
use App\Framework\Core\Router;

Router::get('/', [
	'controller' => 'Pages',
	'func'       => 'home',
	'alias'      => 'index'
]);

Router::post('/', [
	'controller' => 'Pages',
	'func'       => 'postHome',
]);

Router::get('/test', [
	'controller' => 'Pages',
	'func'       => 'test',
	'alias'      => 'testpage'
]);
