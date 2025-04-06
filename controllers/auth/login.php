<?php
include(relative('database/store.php'));
include(relative('database/store.php'));
include(relative('database/model/user.php'));

global $HTTP_POST_VARS;

$GLOBALS['old'] = $HTTP_POST_VARS;
unset($GLOBALS['old']['password']);

if (strlen($HTTP_POST_VARS["email"]) < 3) {
	$GLOBALS["error"] = "email";
	$GLOBALS["errorMessage"] = "Please provide a valid e-mail.";
	include(relative('views/auth/login.php'));
	return;
} else if (!object_exists("user", $HTTP_POST_VARS["email"])) {
	$GLOBALS["error"] = "email";
	$GLOBALS["errorMessage"] = "An account for this email does not exist.";
	include(relative('views/auth/login.php'));
	return;
}

$user = find_object("user", $HTTP_POST_VARS["email"]);
if ($user->password != md5($HTTP_POST_VARS["password"])) {
	$GLOBALS["error"] = "password";
	$GLOBALS["errorMessage"] = "The password is incorrect!";
	include(relative('views/auth/login.php'));
	return;
}

$GLOBALS['user_email'] = $HTTP_POST_VARS["email"];
session_register("user_email");

header('Location: /');
?>
