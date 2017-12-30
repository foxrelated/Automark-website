<?php
  class pagesModel extends models{
    private $_query,
            $_resulte,
            $_count;
    public function __construct(){
      parent::__construct();
    }
       public function insert($array=array()){
         if(count($array)==4){
         $this->_query=$this->_db->prepare("insert into pages values ('',?,?,?,?)");
            $this->_query->bind_param("sssi",$array['name'],$array['subject'],$array['dir'],$array['order']);
                if($this->_query->execute()){
                  return true;
                }
            }
            return false;
       }
           public function edit($array){

         $this->_query=$this->_db->prepare("update  pages  set name_p=? , subject_p=? ,dir_p=?,order_p=? where id_p=?");
            $this->_query->bind_param("sssii",$array['name'],$array['subject'],$array['dir'],$array['order'],$array['id']);
                if($this->_query->execute()){
                  return true;
                }
            
            return false;
       }
    public function getAll(){
      $sql=$this->_db->query("select * from pages ");
        if($sql){
            $rows=array();

            while($array=$sql->fetch_array()){
                  $rows[]=$array;
            }
          return  $rows;
        }
        return false;
    }

      public function getId($id){
        $id=(int)$id;
      $sql=$this->_db->query("select * from pages where  id_p = $id ");
        if($sql){
            $rows=array();

            $array=$sql->fetch_assoc();
          return  $array;
        }
        return false;
    }


   public function remove($id){
       $mysql=$this->_db->prepare("delete from pages where id_p = ?");
       $mysql->bind_param("i",$id);
        if( $mysql->execute()){
          return true;
        }
        return false;
     }


  }

?>