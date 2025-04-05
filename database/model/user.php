<?php
class User {
	var $name;
	var $email;
	var $password; // [Later] Hash of the password.
	var $projects; // An array of project-ids.
	var $email_verified_at;
}

include('config/store.php');

if (!is_dir($GLOBALS['db_path'] . '/users'))
	mkdir($GLOBALS['db_path'] . '/users', 0777);
?>
