<?php
  class cookies{
    public function __construct(){

    }

    public static function exists($name){
      return isset($_COOKIE[$name])?true:false;
    }

    public static function get($name){
      if(self::exists($_COOKIE[$name])){
        return $_COOKIE[$name];
      }else{
        return '';
      }
    }
    public static function put($name,$value,$expiry){
        if(setcookie($name,$value,time()+$expiry)){
          return true;
        }
        return false;

    }
    public static function delete($name){

          self::put($name,'',-1);

    }
  }

?>