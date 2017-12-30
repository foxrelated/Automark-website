<?php
  class showsModel extends models{
    private $_query,
            $_resulte,
            $_count;
    public function __construct(){
      parent::__construct();
    }
       public function insert($array=array()){

         $this->_query=$this->_db->prepare("insert into shows values ('',?,?,?,?,?)");
            $this->_query->bind_param("ssssi",$array['name'],$array['images'],$array['act'],$array['ads'],$array['type']);
                if($this->_query->execute()){
                  return true;
                }

            return false;
       }


       public function edit($array=array()){

         $this->_query=$this->_db->prepare("update  shows set name_s= ?  ,images_s = ?, act_s=?, ads_s=?, type_s=? where id_s=?");
            $this->_query->bind_param("ssssii",$array['name'],$array['images'],$array['act'],$array['ads'],$array['type'],$array['id']);
                if($this->_query->execute()){
                  return true;
                }

            return false;
       }

    public function getAll($act='',$arr=''){
      $add=(isset($act) and $act=='on')?' and act_s =1 ':'';
      $add.=(isset($arr['type']) and $arr['type']=='rental')?' and type_s = 2 ':'';
      $add.=(isset($arr['type']) and $arr['type']=='bay')?' and type_s = 1 ':'';
      $add.=(isset($arr['limit']))?' limit '.(int)$arr['limit']:'';
       $add.=(isset($arr['limit_end']) and $arr['limit_end']!='' and is_numeric($arr['limit_end']))?" limit ".$arr['limit_start']." ,".$arr['limit_end']:'';

      $sql=$this->_db->query("select * from shows where id_s!='' $add  ");
        if($sql){
            $rows=array();

            while($array=$sql->fetch_array()){
                  $rows[]=$array;
            }
          return  $rows;
        }
        return false;
    }
     public function getlimit($limit,$dir){
      $sql=$this->_db->query("select * from shows  order by id_s $dir limit $limit");
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
        $sql=$this->_db->query("select * from shows where  id_s = $id ");
        if($sql){
            $rows=$sql->fetch_assoc();
          return  $rows;
        }
        return false;
    }
      public function remove($id){
       $mysql=$this->_db->prepare("delete from shows where id_s = ?");
       $mysql->bind_param("i",$id);
        if( $mysql->execute()){
          return true;
        }
        return false;
     }
  }

?>