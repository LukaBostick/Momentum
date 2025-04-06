<?php
include(relative('database/store.php'));
include(relative('database/model/project.php'));

global $HTTP_POST_VARS;

$GLOBALS['old'] = $HTTP_POST_VARS;


if (strlen($HTTP_POST_VARS["title"]) < 3) {
	$GLOBALS['error'] = "title";
	$GLOBALS['errorMessage'] = "Your project’s title must be at least 3 characters long!";
	include(relative('views/projects/create.php'));
	exit;
}

$new_proj = new Project();
$new_proj->title = $HTTP_POST_VARS['title'];
$new_proj->description = $HTTP_POST_VARS['description'];
$new_proj->owner_id = $GLOBALS['user_email'];

preg_match_all('/[a-z]*/', strtolower($new_proj->title), $title_ascii);
foreach($title_ascii[0] as $title_ascii_part)
    $new_proj->id = $new_proj->id . $title_ascii_part;

if ($new_proj->id == "create" || $new_proj->id == "delete" || $new_proj->id == "index") {
	$GLOBALS['error'] = "title";
	$GLOBALS['errorMessage'] = "Your project’s title can’t be “create”, “delete”, or “index”!";
	include(relative('views/projects/create.php'));
	exit;
}

write_object($new_proj);
?>
