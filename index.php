<?php
// Define our project’s root directory, since includes() change cwd.
define('ROOT', getcwd());

// PHP 4.0 doesn’t define DIRECTORY_SEPARATOR, so we will.
define('DIRECTORY_SEPARATOR', PHP_OS == 'WINNT' ? '\\' : '/');

// Create a path relative to the project’s root.
function relative($path) {
	return ROOT . DIRECTORY_SEPARATOR . str_replace("/", DIRECTORY_SEPARATOR, $path);
}

// Used globals!
$GLOBALS['old'] = array(); // Old values of a form to be edited & resubmitted.

// Perform routing, kicking off everything.
include(relative('routes.php'));
?>
