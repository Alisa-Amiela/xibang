<?php
[
    'dirname' => $dirname,
    'basename' => $basename
] = pathinfo($_SERVER['SCRIPT_FILENAME']);

$GLOBALS['dzApi'] = new Douzhi\Router();
$GLOBALS['dzApi']->dirname = $dirname;
$GLOBALS['dzApi']->basename = $basename;
$GLOBALS['dzApi']->run();

register_shutdown_function(function () {
  $GLOBALS['dzApi']->response();
});