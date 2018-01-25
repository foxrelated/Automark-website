<?php
ini_set('display_errors', 0);
$uri = rtrim( dirname($_SERVER["SCRIPT_NAME"]), '/' );
$uri = '/' . trim( str_replace( $uri, '', $_SERVER['REQUEST_URI'] ), '/' );
 $uri = urldecode( $uri );

define('DS', DIRECTORY_SEPARATOR);
define('ROOT', realpath(dirname(__FILE__)) . DS);
define('APP_PATH', ROOT . 'App' . DS);
define('APP_CORE', ROOT . 'App' . DS . 'core' . DS);

     require_once(APP_PATH.'init.php');

     

?>
