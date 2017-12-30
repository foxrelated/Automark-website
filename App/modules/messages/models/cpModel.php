<?php
  class cpModel extends models{
    private $_query,
            $_resulte,
            $_count;
    public function __construct(){
      parent::__construct();
    }

      public function edit($array=array()){

         $this->_query=$this->_db->prepare("update access set name_a=?,section_a=? , marka_a=? ,color_a=? ,price_a=?,country_a=?,city_a=?,special_a=?,images_a=?,act_a=? where id_a=?");
            $this->_query->bind_param("ssssiiissii",$array['name'],$array['section'],$array['marka'],$array['color'],$array['price'],$array['country'],$array['city'],$array['special'],$array['images'],$array['act'],$array['id']);
                if($this->_query->execute()){
                  return true;
                }

            return false;
       }
    public function getAll($array=''){
        $add='';

       $add.=(isset($array['status']))?" and status = ".$array['status']:'';
       $add.=(isset($array['code']))?" and code = ".$array['code']:'';
       $add.=' order by id desc';
       $add.=(isset($array['limitend']))?" limit ".$array['limitend']:'';
      $sql=$this->_db->query("select * from order_cars where id!='' $add ");
        if($sql){
            $rows=array();

            while($array=$sql->fetch_array()){
                  $rows[]=$array;
            }
          return  $rows;
        }
        return false;
    }
      public function getTentAll($array=null){
        $add='';
        $add.=(isset($array['limitend']))?" limit ".$array['limit']:'';
      $sql=$this->_db->query("select * from order_cars where code ='rent'  $add");
        if($sql){
            $rows=array();

            while($array=$sql->fetch_array()){
                  $rows[]=$array;
            }
          return  $rows;
        }
        return false;
    }

          public function active($values){

            $this->_query=$this->_db->prepare("update  order_cars set
						status=?
						where id = ?
					");
           $this->_query->bind_param("ii",
                        $values['status'],
                        $values['id']
           );
            if($this->_query->execute()){
                  return true;
                }

            return false;
       }
public function getId($id){
      $id=(int)$id;
      $sql=$this->_db->query("select * from order_cars where  id = $id ");
        if($sql){
            $rows=array();
            $array=$sql->fetch_assoc();
          return  $array;
        }
        return false;
    }
   public function remove($id){
       $mysql=$this->_db->prepare("delete from order_cars where id = ?");
       $mysql->bind_param("i",$id);
        if( $mysql->execute()){
          return true;
        }
        return false;
     }


  }

?>