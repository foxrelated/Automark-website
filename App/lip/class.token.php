<?php
  class token{
    private $_register;
    private $_session;
  public function __construct(){
        $this->_register=Registry::getInstancia();
  }
    public function generate(){
      return session::put(system::get('session/session_token'),md5(uniqid()));
    }

    public function check($token){
        $nameToken=system::get('session/session_token');
      if(session::exists($nameToken) and  session::get($nameToken)==$token){
        session::delete($nameToken);
        return true   ;
      }
      return false;
    }
  }

?>