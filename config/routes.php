<?php
use App\Framework\Core\Router;

Router::get('/', [
	'controller' => 'Pages',
	'call'       => 'home',
	'alias'      => 'index'
]);

Router::post('/', [
	'controller' => 'Pages',
	'call'       => 'postHome',
]);

Router::get('/test', [
	'controller' => 'Pages',
	'call'       => 'test',
	'alias'      => 'testpage'
]);
