<?php
// The basic object-store, since we want to avoid the pain that is setting up an old enough PGSQL.

include('database/model/project.php');


$GLOBALS['db_path'] = 'store/';


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

// Return the directory-path corresponding to an object $type (e.g., “project”).
function type_path($type) {
	return $GLOBALS['db_path'] . '/' . strtolower($type) . 's/';
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
	return type_path($type) . '/' . $id;
}

// Return an object’s path.
function object_path($obj) {
	return object_path_of_id(get_class($obj), $obj->id);
}


?>
