<?php
use App\Framework\Core\Router;

Router::get('/', [
	'controller' => 'Pages',
	'call'       => 'home',
	'alias'      => 'index'
]);

/**
 * Test FORM post
 */
Router::post('/', [
	'controller' => 'Pages',
	'call'       => 'postHome',
]);

/**
 * Test AJAX post
 */
Router::post('/ajaxTest', [
	'controller' => 'Ajax',
	'call'       => 'test',
]);

Router::get('/test', [
	'controller' => 'Pages',
	'call'       => 'test',
	'alias'      => 'testpage'
]);
