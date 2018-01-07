<?php

abstract class controller{

    private $_register;
    protected $_request;
    protected $_view;
    protected $_acl;
    protected $_lang;
    protected $_token;
    protected $_input;
    protected $_validate;
    protected $_securty;
    protected $_session;
    protected $_hash;
    protected $_func;
    protected $_permis;
    public function __construct(){
         $this->_register=Registry::getInstancia();
         $this->_request=$this->_register->_request;
         $this->_view=new view($this->_request);
         $this->_securty=$this->_register->_securty;
         $this->_lang=$this->_register->_langswitch;
         $this->_token=$this->_register->_token;
         $this->_input=$this->_register->_input;
         $this->_validate=$this->_register->_validate;
         $this->_hash=$this->_register->_hash;
         $this->_acl=$this->_register->_acl;
         $this->_func=$this->_register->_func;
         $this->getFunctionTmp();


         $controller=array('mycars');
         $method=array('profile','password');
         $access_method=array('index','newpassword');
         $access_controller=array('login','register');

         if($this->_request->getModuls()=='admin' and !$this->_acl->_permis('admin')){
              session::redir("users/login/index/cp");
         }
          if($this->_request->getController()=='admin' and !$this->_acl->_permis('admin')){
              session::redir("users/login/index/cp");
         }
           if(in_array($this->_request->getController(),$controller) and (!$this->_acl->_permis('users') and !$this->_acl->_permis('admin'))){
            //  session::redir("users/login/index");
         }
         if(in_array($this->_request->getMethod(),$method) and (!$this->_acl->_permis('users') and !$this->_acl->_permis('admin'))){
            // session::redir("users/login/index");
         }

         if(in_array($this->_request->getController(),$access_controller) and (!$this->_acl->_permis('users') and !$this->_acl->_permis('admin'))){
            if(in_array($this->_request->getMethod(),$access_method) and (!$this->_acl->_permis('users') and !$this->_acl->_permis('admin'))){
             // session::redir("index");
            }
         }

    }
  abstract public function index();


  protected function loadModel($modelFile,$modules=false,$data=''){
    $model=$modelFile.'Model';
    $dirModel=APP_PATH.'models'.DS.$model.'.php';
  if(!$modules) {
         $modules=$this->_request->getModuls();
    }

  if(isset($modules) and $modules!='default'){
        $dirModel=APP_PATH.'modules'.DS.$modules.DS.'models'.DS.$model.'.php';
  }
  
  if(is_readable($dirModel)){
    require_once($dirModel);
    if(isset($data)){
    $modelClass=new $model($data);
        }else{
    $modelClass=new $model;
    }
    return $modelClass;
  }else{
      throw new Exception(sprintf(_t('Error Model Not Exists The File %s '),$modelFile));
  }
  }
    protected function loadLib($libFile,$mod=false){
      if(isset($mod)){
           return  new $libFile($mod);
      }else{
         return  new $libFile;
      }
  }
 private function getFunctionTmp(){
     if(is_readable(APP_PATH . 'template' . DS . system::_data('default_style') . DS .'function.php' )){
         include(APP_PATH . 'template' . DS . system::_data('default_style') . DS .'function.php' );
     }
 }

}

?>