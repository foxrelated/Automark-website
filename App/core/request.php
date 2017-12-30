<?php

  class Request{
    private $_modele,
            $_models,
            $_controller,
            $_method,
            $_params=array(),
            $_url;
       public function __construct(){
         $this->parse_url();
         $this->_models= system::get('models');

         if(count($this->_url)){	
              $this->_modele=strtolower(array_shift($this->_url)) ;

             if(!$this->_modele) {
                    $this->_modele=false;

             }else{
                if(count($this->_models)){

	
                   if(in_array($this->_modele,$this->_models)==false){
                          $this->_controller=$this->_modele;
                          $this->_modele=false;

                   }else{

                           $this->_controller=strtolower(array_shift($this->_url));
                        if(!$this->_controller){
                            $this->_controller=system::_data('default_controller');
   
                        }
                   }

                }else{

                    $this->_controller=$this->_modele;
                    $this->_modele=false;
                }

                  $this->_method= strtolower(array_shift($this->_url));

                  $this->_params=$this->_url;

             }

         }

          if(!$this->_controller){
			  if(in_array(system::_data('default_controller'),$this->_models)){
				 $this->_controller = 'index';
				 $this->_modele=system::_data('default_controller');  
			  }else{
				 $this->_controller = system::_data('default_controller');
				 $this->_modele=false;  
			  }
				
        }

        if(!$this->_method){
            $this->_method = 'index';
        }

        if(!isset($this->_params)){
            $this->_params = array();
        }

       }
       private function parse_url(){

        $uri = rtrim( dirname($_SERVER["SCRIPT_NAME"]), '/' );
        $uri = str_replace( $uri, '', $_SERVER['REQUEST_URI'] );
        $uri = trim( str_replace( '?'.$_SERVER['QUERY_STRING'], '',$uri  ), '/' );
        $uri = urldecode( $uri );
         $filter=filter_var(rtrim($uri,'/'),FILTER_SANITIZE_URL);
                $arrayUrl=explode('/',$filter);
                $arrayUrl=array_filter($arrayUrl);
                $this->_url=$arrayUrl;

                if(!empty($_SERVER['QUERY_STRING'])){
                   $_SERVER['REQUEST_URI']=$_SERVER['QUERY_STRING'];
                   }


          /* if(isset($_GET['url'])){
                $url=$_GET['url'];
                $filter=filter_var(rtrim($url,'/'),FILTER_SANITIZE_URL);
                $arrayUrl=explode('/',$filter);
                $arrayUrl=array_filter($arrayUrl);
                $this->_url=$arrayUrl;
                }
               */





        }

        public function getModuls(){
          return $this->_modele;
        }
        public function getController(){
          return $this->_controller;
        }
        public function getMethod(){
          return $this->_method;
        }
         public function getParams(){
          return $this->_params;
        }
  }

?>