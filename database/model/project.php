<?php
class Project {
	var $title;
	var $owner_id;
	var $updated_at;
	var $created_at;
	var $id;
	var $description;
}

include('config/store.php');

if (!is_dir($GLOBALS['db_path'] . '/projects'))
	mkdir($GLOBALS['db_path'] . '/projects', 0777);
?>
