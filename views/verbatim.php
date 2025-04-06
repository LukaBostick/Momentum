<?php
// Simple: Return a file, verbatim. Useful for /resources and /public!

$file = ROOT . getenv('REQUEST_URI');

// Guess the mime-type, based on our hard-coded values… and the file extension. ^^,
function mime_type($file) {
	$extension = preg_replace('/.*\./', '', $file);
	$types = array("css" => "text/css", "png" => "image/png",
				   "jpg" => "image/jpg", "jpeg" => "image/jpg");
	return $types[$extension] ? $types[$extension] : "application/octet-stream";
}


if (file_exists($file)) {
	// Set the appropriate headers
	header('Content-Type: ' . mime_type($file));
	header('Content-Length: ' . filesize($file));
	readfile($file);
	exit;
} else {
	header("HTTP/1.0 404 Not Found");
}
?>
