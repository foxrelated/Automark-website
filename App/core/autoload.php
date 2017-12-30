<?php

  function autoloadCore($class){
    if(file_exists(APP_CORE . strtolower($class) . '.php')){
        include_once  APP_CORE . strtolower($class) . '.php';
    }
}
  function autoloadlip($class){
    if(file_exists(APP_PATH .'lip/class.'. strtolower($class) . '.php')){
        include_once  APP_PATH .'lip/class.'. strtolower($class) . '.php';
    }
}
spl_autoload_register("autoloadCore");
spl_autoload_register("autoloadlip");

?>