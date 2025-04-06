<?php
include(relative('database/store.php'));
include(relative('database/model/project.php'));

global $HTTP_POST_VARS;

$GLOBALS['old'] = $HTTP_POST_VARS;

$project = find_object("project", $HTTP_POST_VARS['project']);

$project->tasks[] = $HTTP_POST_VARS['body'];

write_object($project);
header('Location: /projects/' . $project->id);
?>
