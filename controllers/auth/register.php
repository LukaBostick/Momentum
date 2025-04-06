<?php
include(relative('database/store.php'));
include(relative('database/store.php'));
include(relative('database/model/user.php'));

global $HTTP_POST_VARS;

$GLOBALS['old'] = $HTTP_POST_VARS;
unset($GLOBALS['old']['password']);
unset($GLOBALS['old']['password_confirmation']);


if (strlen($HTTP_POST_VARS["name"]) < 3) {
	$GLOBALS['error'] = "name";
	$GLOBALS['errorMessage'] = "Your name must be at least 3 characters long!";
	include(relative('views/auth/register.php'));
	exit;
}

if (strlen($HTTP_POST_VARS["email"]) < 3) {
	$GLOBALS['error'] = "name";
	$GLOBALS['errorMessage'] = "Your email must be at least 3 characters long!";
	include(relative('views/auth/register.php'));
	exit;
}

if (strlen($HTTP_POST_VARS["password"]) < 3) {
	$GLOBALS['error'] = "password";
	$GLOBALS['errorMessage'] = "Your password is too short!";
	include(relative('views/auth/register.php'));
	exit;
} else if ($HTTP_POST_VARS["password"] != $HTTP_POST_VARS["password_confirmation"]) {
	$GLOBALS['error'] = "password";
	$GLOBALS['errorMessage'] = "Your passwords don’t match!";
	include(relative('views/auth/register.php'));
	exit;
}

$new_user = new User();
$new_user->name = $HTTP_POST_VARS['name'];
$new_user->email = $HTTP_POST_VARS['email'];
$new_user->id = $new_user->email;

$password = $HTTP_POST_VARS['password'];
$new_user->password = function_exists("sha256") ? sha256($pasword) : md5($password);

if (object_exists("user", $new_user->email)) {
	$GLOBALS['error'] = "email";
	$GLOBALS['errorMessage'] = "An account with that email already exists.";
	include(relative('views/auth/register.php'));
	exit;
}

write_object($new_user);
header('Location: ' . '/?msg=register');

?>
