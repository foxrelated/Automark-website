<?php
  class settingsModel extends models{
    private $_query,
            $_resulte,
            $_count;
    public function __construct(){
      parent::__construct();
    }
       public function insert($array=array()){
         if(count($array)==3){
         $this->_query=$this->_db->prepare("insert into option_system values ('',?,?,?)");
            $this->_query->bind_param("sss",$array['name'],$array['value'],$array['type']);
                if($this->_query->execute()){
                  return true;
                }
            }
            return false;
       }
      public function edit($array=array()){

         $this->_query=$this->_db->prepare("update option_system set value_sys=?  where name_sys=?");
            $this->_query->bind_param("ss",$array['value'],$array['name']);
                if($this->_query->execute()){
                  return true;
                }

            return false;
       }
    public function getAll($arr=array()){
		$add=(isset($arr['type']) and $arr['type']!='')? " where type_sys = '".$arr['type']."'":"";
      $sql=$this->_db->query("select * from option_system $add");
        if($sql){
            $rows=array();

            while($array=$sql->fetch_array()){
                  $rows[]=$array;
            }
          return  $rows;
        }
        return false;
    }

      public function getName($name){
      
      $sql=$this->_db->query("select * from option_system where  name_sys = '$name' ");
        if($sql){
            $rows=array();

            while($array=$sql->fetch_array()){
                  $rows[]=$array;
            }
          return  $rows;
        }
        return false;
    }

     public function getNameId($name){
        
      $sql=$this->_db->query("select * from option_system where  name_sys = '$name' ");
        if($sql){
            $rows=array();

           $array=$sql->fetch_assoc();

          return  $array['value_sys'];
        }
        return false;
    }
   public function remove($id){
       $mysql=$this->_db->prepare("delete from option_system where sys_name = ?");
       $mysql->bind_param("i",$id);
        if( $mysql->execute()){
          return true;
        }
        return false;
     }

  }

?>