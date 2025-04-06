<?php

// The list of URIs associated with their views in get/.
$GLOBALS['GET'] = array("/" => "welcome.php", "/projects" => "projects/index.php",
						"/login" => "auth/login.php", "/register" => "auth/register.php",
	                    "/resources" => "verbatim.php", "/public" => "verbatim.php");
// The list of URIs associated with their files in post/.
$GLOBALS['POST'] = array("/register" => "auth/register.php");


// Execute the appropraite file for the given URI.
function route($uri, $method) {
	include(relative(($method == "GET" ? "views/" : "controllers/") . find_route($uri, $method)));
}

// Find the appropriate file to execute for a given URI.
function find_route($uri, $method) {
	global $GET;
	global $POST;

	if ($uri == '\\') # Windows is weird.
		$uri = '/';

	if ($method == "GET" && $GET[$uri])
		return $GET[$uri];
	else if ($method == "POST" && $POST[$uri])
		return $POST[$uri];
	else
		return find_route(dirname($uri), $method);
}


// Route away!
route(getenv("REQUEST_URI"), getenv("REQUEST_METHOD"));

?>
