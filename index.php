<?php
session_start();

// Define our project’s root directory, since includes() change cwd.
define('ROOT', getcwd());

// PHP 4.0 doesn’t define DIRECTORY_SEPARATOR, so we will.
if (!defined('DIRECTORY_SEPARATOR'))
	define('DIRECTORY_SEPARATOR', PHP_OS == 'WINNT' ? '\\' : '/');

// Create a path relative to the project’s root.
function relative($path) {
	return ROOT . DIRECTORY_SEPARATOR . str_replace("/", DIRECTORY_SEPARATOR, $path);
}

// Used globals!
$GLOBALS['old'] = array(); // Old values of a form to be edited & resubmitted.

// PHP 4.0 doesn’t have $_SESSION, sooo… @w@
if ($_SESSION && $_SESSION["user_email"])
	$GLOBALS["user_email"] = $_SESSION["user_email"];

if (is_array($_POST))
	$HTTP_POST_VARS = $_POST;

// Perform routing, kicking off everything.
include(relative('routes.php'));
?>
