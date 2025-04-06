<?php
// The basic object-store, since we want to avoid the pain that is setting up an old enough PGSQL.
define('STORE_LOADED', true); if (STORE_LOADED) return;

include(relative('config/store.php'));

if (!is_dir($GLOBALS['db_path']))
    mkdir($GLOBALS['db_path'], 0777);

// List all objects of the given $type, by ID.
function list_objects($type) {
	$objs = array();

	if ($handle = opendir(type_path($type))) {
		while (false !== ($file = readdir($handle))) {
			if ($file != "." && $file != "..") {
				$objs[] = $file;
			}
		}
		closedir($handle);
	}
	return $objs;
}

// Returns whether or not an object already exists.
function object_exists($type, $id) {
	return in_array($id, list_objects($type));
}

// Write an object, potentially overriding its previous version.
// TODO: File-lock, to prevent simultaneus writes.
function write_object($obj) {
	$filename = object_path($obj);

	$handle = fopen($filename, 'w');
	fwrite($handle, serialize($obj));
	fclose($handle);
}

// Fetch an object from the object store, given its $type and $id.
function find_object($type, $id) {
	$filename = object_path_of_id($type, $id);

	$handle = fopen($filename, 'r');
	$filesize = filesize($filename);

    $content = fread($handle, $filesize);
    fclose($handle);

	return unserialize($content);
}


// Util
// —————————————————————————————————————
// Return an object’s file-path using its $type (“project”) and $id.
function object_path_of_id($type, $id) {
	return type_path($type) . DIRECTORY_SEPARATOR . $id;
}

// Return an object’s path.
function object_path($obj) {
	return object_path_of_id(get_class($obj), $obj->id);
}

// Return the directory-path corresponding to an object $type (e.g., “project”).
function type_path($type) {
	return relative('store' . '/' . strtolower($type) . 's/');
}

?>
