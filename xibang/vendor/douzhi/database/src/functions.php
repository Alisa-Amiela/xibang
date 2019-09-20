<?php
$GLOBALS['id'] = isset($_GET['id']) && !empty($_GET['id']) ? (int)$_GET['id'] : null;

$srcDir = dirname(__FILE__);
if( stripos('vendor', $srcDir) != -1 ){
  $appPath = str_replace('/vendor/douzhi/database/src', '', str_replace('\\', '/', $srcDir ));
}else{
  $appPath = str_replace('/src', '', str_replace('\\', '/', $srcDir ));
}

if (file_exists($appPath . '/.env')) {
  $dotenv = Dotenv\Dotenv::create($appPath);
  $dotenv->load();
}

function db($name)
{
  return \Douzhi\Excel::table($name);
}

function excel($name)
{
  $dir = getenv('DATA_DIR') ?? '';
  return \Douzhi\Excel::table("{$dir}{$name}");
}
