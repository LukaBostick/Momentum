<?php

// The list of URIs associated with their views in views/.
$GLOBALS['GET'] = array("/" => "welcome.php", "/projects" => "projects/index.php",
	                    "/resources" => "verbatim.php", "/public" => "verbatim.php");
$GLOBALS['POST'] = array();


// Execute the appropraite file for the given URI.
function route($uri, $method) {
	include_relative("views/" . find_route($uri, $method));
}

// Find the appropriate file to execute for a given URI.
function find_route($uri, $method) {
	global $GET;

	if ($uri == '\\') # Windows is weird.
		$uri = '/';

	if ($GET[$uri])
		return $GET[$uri];
	else
		return find_route(dirname($uri), $method);
}


// Route away!
route(getenv("REQUEST_URI"), "GET");

?>
