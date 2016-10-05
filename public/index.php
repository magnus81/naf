<?php
/**
 * Framework
 *
 * @author Magnus <test@test.com>
 * @version 0.1
 */

// Autoload classes
require __DIR__ . '/../framework/autoloader.php';

session_start();

// Go a head and run the application
App\Framework\Core\App::run();

// Close application
App\Framework\Core\App::close();
