<?php

define('BASE_PATH', realpath(__DIR__ . '/..'));

/**
 * autoloader
 *
 * Our autoloader for the framework
 * @param  $class
 * @return void
 */
function autoloader($class) {
	$filename = BASE_PATH . '/../' . str_replace('\\', DIRECTORY_SEPARATOR, $class) . '.php';
	include $filename;
	if (is_callable([$class, '__init__']))
		$class::__init__();
}
spl_autoload_register('autoloader');

// Include helper functions file
include BASE_PATH . '/framework/helpers.php';
