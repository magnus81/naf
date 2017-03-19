<?php

// Define paths
define('BASE_PATH', realpath(__DIR__ . '/..'));
define('VIEW_PATH', realpath(__DIR__ . '/..') . '/views/');

/**
 * autoloader
 *
 * Our autoloader for the framework
 * @param  $class
 * @return void
 */
function autoloader($class) {
	$filename = str_replace('\\', DIRECTORY_SEPARATOR, $class) . '.php';
	$filename = str_replace('App/', '', $filename);
	$filename = BASE_PATH . '/' . $filename;

	include $filename;
	if (is_callable([$class, '__init__']))
		$class::__init__();
}
spl_autoload_register('autoloader');

// Include helper functions file
include BASE_PATH . '/framework/helpers.php';
