<?php
// Define our project’s root directory, since includes() change cwd.
define('ROOT', getcwd());

// PHP 4.0 doesn’t define DIRECTORY_SEPARATOR, so we will.
define('DIRECTORY_SEPARATOR', PHP_OS == 'WINNT' ? '\\' : '/');

// Create a path relative to the project’s root.
function relative_path($path) {
	return ROOT . DIRECTORY_SEPARATOR . str_replace("/", DIRECTORY_SEPARATOR, $path);
}

// include() a file from a path relative to project root.
function include_relative($path) {
	include(relative_path($path));
}

// Perform routing, kicking off everything.
include_relative('routes.php')
?>
