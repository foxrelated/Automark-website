<?php

  class system{
	private  $_register;
	private  $_db;
	public static  $_get;

	public function  __construct(){
		  $this->_register=Registry::getInstancia();
		  $this->_db=$this->_register->_db;
		  $this->_register->query_setting=$this->query_system();
		  self::$_get= $this->_register->query_setting;
		
	}
        public  static function get($path=null){
            if($path){
              $config=$GLOBALS['config'];
              $path=explode('/',$path);


              foreach($path AS $bit){
                if(isset($config[$bit])){
                  $config=$config[$bit];
                }else{
                  return false;
                }
              }

              return $config;
            }
            return false;
        }
      private  function query_system(){
		
      $sql=  $this->_db->query("select * from option_system ");
        if($sql){
            $rows=array();
            while($array=$sql->fetch_array()){
                  $rows[]=$array;
            }
			//$this->_db->free_result;
         return $rows;
        }
        return false;
		  
	  }

	 public static function _data($name,$type=''){
		 foreach(self::$_get as $rows){
			 if(isset($type) and $type!=''){
				 if(isset($rows['name_sys']) and $rows['name_sys']==$name and $type==$rows['type_sys']){
                    $config=$rows['value_sys'];
                }
			 }
			  if(isset($rows['name_sys']) and $rows['name_sys']==$name){
                    $config=$rows['value_sys'];
                }
			 
		 }
		 if(isset($config)){
			 return $config;
		 }
                  return false;
                
		 
	 }  

  }

?>