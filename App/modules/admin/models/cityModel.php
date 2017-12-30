<?php
  class cityModel extends models{
    private $_query,
            $_resulte,
            $_count;
    public function __construct(){
      parent::__construct();
    }
       public function insert($array=array()){
         if(count($array)==3){
         $this->_query=$this->_db->prepare("insert into city values ('',?,?,?)");
            $this->_query->bind_param("sis",$array['name'],$array['sub'],$array['code']);
                if($this->_query->execute()){
                  return true;
                }
            }
            return false;
       }
      public function edit($array=array()){

         $this->_query=$this->_db->prepare("update city set name_c=?,code_c=? , sub_c=? where id_c=?");
            $this->_query->bind_param("sssi",$array['name'],$array['code'],$array['sub'],$array['id']);
                if($this->_query->execute()){
                  return true;
                }

            return false;
       }
    public function getCountryAll(){
      $sql=$this->_db->query("select * from city where sub_c = 0 or sub_c ='' ");
        if($sql){
            $rows=array();

            while($array=$sql->fetch_array()){
                  $rows[]=$array;
            }
          return  $rows;
        }
        return false;
    }

      public function getCityId($id){
        $id=(int)$id;
      $sql=$this->_db->query("select * from city where  sub_c = $id ");
        if($sql){
            $rows=array();

            while($array=$sql->fetch_array()){
                  $rows[]=$array;
            }
          return  $rows;
        }
        return false;
    }

     public function getNameId($id){
        $id=(int)$id;
      $sql=$this->_db->query("select * from city where  id_c = $id ");
        if($sql){
            $rows=array();

           $array=$sql->fetch_assoc();

          return  $array['name_c'];
        }
        return false;
    }
       public function getId($id){
        $id=(int)$id;
      $sql=$this->_db->query("select * from city where  id_c = $id ");
        if($sql){
            $rows=array();

           $array=$sql->fetch_assoc();

          return  $array;
        }
        return false;
    }
   public function remove($id){
       $mysql=$this->_db->prepare("delete from city where id_c = ?");
       $mysql->bind_param("i",$id);
        if( $mysql->execute()){
          return true;
        }
        return false;
     }
      public function removeSub($id){
       $mysql=$this->_db->prepare("delete from city where sub_c = ?");
       $mysql->bind_param("i",$id);
        if( $mysql->execute()){
          return true;
        }
        return false;
     }

  }

?>