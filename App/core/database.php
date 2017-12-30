<?php
  class database extends MYSQLI{
         public function __construct(){
                if(system::get('mysql/typeDB')==='pdo'){
              parent::__construct(
                    'mysql:host='.system::get('mysql/localhost')  .
                    ';dbname='.system::get('mysql/db') ,
                    system::get('mysql/user'),
                    system::get('mysql/pass'));
              }
               if(system::get('mysql/typeDB')==='mysqli'){
                       parent::__construct(
                       system::get('mysql/localhost'),
                       system::get('mysql/user'),
                       system::get('mysql/pass'),
                       system::get('mysql/db')
                       );
                 }
         }

        
    public function code_max($code,$tbl){
           $mysql=$this->query("SELECT MAX(".$code.") as code FROM  ".$tbl);
        
          if($mysql){
            $data= $mysql->fetch_array();
            return $data['code']+1; 
          }
          return false;
          
      }
      
	public function set_chars() {
		     return $this->set_charset( system::get('mysql/db_char'));
        	}

     public function disconnect() {
         return $this -> close();
        }
  }

?>