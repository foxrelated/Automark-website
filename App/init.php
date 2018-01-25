<?php  // session_start();

     require_once(APP_PATH.'lip/php-gettext/gettext.inc');
     require_once(ROOT.'config.php');
     require_once(APP_CORE.'autoload.php');
      try{
           session::init();
           $register=Registry::getInstancia();
           $register->_db=new database;
           $register->_system=new system;
           $register->_request=new Request;
           $register->_language=new language;
           $register->_langswitch=new switchlang;
           $register->_securty=new securty;
           $register->_token=new token;
           $register->_input=new input;
           $register->_hash=new hash;
           $register->_validate=new validate;
           $register->_func=new func();
           $register->_acl=new acl();

        App::Run($register->_request);
       }catch(Exception $e){
              echo $e->getMessage();
        }



?>