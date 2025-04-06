<?php

// The list of URIs associated with their views in get/.
$GLOBALS['GET'] = array("/" => "views/index.php",
						"/projects" => "views/projects/index.php", "/projects/create" => "views/projects/create.php",
	                    "/login" => "views/auth/login.php", "/register" => "views/auth/register.php",
	                    "/logout" => "controllers/auth/logout.php",
	                    "/resources" => "views/verbatim.php", "/public" => "views/verbatim.php");
// The list of URIs associated with their files in post/.
$GLOBALS['POST'] = array("/register" => "controllers/auth/register.php",
                         "/login" => "controllers/auth/login.php",
                         "/projects/create" => "controllers/projects/create.php",
                         "/projects" => "controllers/projects/task.php");


// Execute the appropraite file for the given URI.
function route($uri, $method) {
	include(relative(find_route($uri, $method)));
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
