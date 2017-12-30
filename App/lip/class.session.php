<?php
  class session{
    public static function init(){
      if(!isset($_SESSION)){
          session_start();
      }
    }
    public static function put($name,$value){
        return $_SESSION[$name]=$value;
    }
    public static function exists($name){
      return isset($_SESSION[$name])?true:false;
    }
    public static function get($name){
      return (self::exists($name)==true)?$_SESSION[$name]:false;
    }
    public static function delete($name){

      if(self::exists($name)==true){
        unset($name);
        return true;
      }
      return false;
    }
    public static  function destroy(){
        session_destroy();
   
        return true;
    }
    public static function flash($kay,$value){
      self::put($kay,$value);

    }
    public static function redir($location=''){
      var_dump($location);
      if($location){
            if(is_numeric($location)){

              switch($location){
                case 404: header("HTTP/1.0 404 Not Found");

                include_once(APP_PATH."views/error/404.php");
                 exit();
                break;

              }

        }
        header("Location:".system::_data('url_site').$location);
      }
    }
  }

?>