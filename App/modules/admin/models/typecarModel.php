<?php
  class typecarModel extends models{
    private $_query,
            $_resulte,
            $_count;
    public function __construct(){
      parent::__construct();
    }
       public function insert($array=array()){
         if(count($array)==4){
         $this->_query=$this->_db->prepare("insert into cars_type values ('',?,?,?,?)");
            $this->_query->bind_param("ssss",$array['name'],$array['type'],$array['images'],$array['category']);
                if($this->_query->execute()){
                  return true;
                }
            }
            return false;
       }
         public function edit($array=array()){

         $this->_query=$this->_db->prepare("update  cars_type set name_t= ? ,sub_t = ? ,images_t = ? ,category_t = ? where id_t=?");
            $this->_query->bind_param("sssii",$array['name'],$array['type'],$array['images'],$array['category'],$array['id']);
                if($this->_query->execute()){
                  return true;
                }

            return false;
       }

    public function getTypeAll($ar=''){
      $add='';
      $add.=(isset($ar['category']))?" and  category_t ='".$ar['category']."'":'';
      $add.=(isset($ar['limit']))?' limit '.$ar['limit']:'';
      $sql=$this->_db->query("select * from cars_type where (sub_t = 0 or sub_t ='') $add ");
        if($sql){
            $rows=array();
            while($array=$sql->fetch_array()){
                  $rows[]=$array;
            }

          return  $rows;
        }
        return false;
    }

      public function getTypeSubId($id){
        $id=(int)$id;
      $sql=$this->_db->query("select * from cars_type where  sub_t = $id and sub_t!=0");
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
      $sql=$this->_db->query("select * from cars_type where  id_t = $id ");
        if($sql){
            $rows=array();

           $array=$sql->fetch_assoc();

          return  $array['name_t'];
        }
        return false;
    }
       public function getId($id){
        $id=(int)$id;
      $sql=$this->_db->query("select * from cars_type where  id_t = $id ");
        if($sql){
            $rows=array();

           $array=$sql->fetch_assoc();

          return  $array;
        }
        return false;
    }
     public function remove($id){
       $mysql=$this->_db->prepare("delete from cars_type where id_t = ?");
       $mysql->bind_param("i",$id);
        if( $mysql->execute()){
          return true;
        }
        return false;
     }
      public function removeSub($id){
       $mysql=$this->_db->prepare("delete from cars_type where sub_t = ?");
       $mysql->bind_param("i",$id);
        if( $mysql->execute()){
          return true;
        }
        return false;
     }
  }

?>