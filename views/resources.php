<?php
$file = ROOT . getenv('REQUEST_URI');


function mime_type($file) {
	return "text/css";
}
if (file_exists($file)) {
// Set the appropriate headers
header('Content-Type: ' . mime_type($file));
header('Content-Length: ' . filesize($file));

// Clear the output buffer
ob_end_clean(); // Use ob_end_clean() instead of ob_clean() in PHP 4
flush();

// Read the file and output its contents
readfile($file);
exit;
} else {
	
header("HTTP/1.0 404 Not Found");
echo "File not found.";
}
