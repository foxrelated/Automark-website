<?php
  class cpaModel extends models{
    private $_query,
            $_resulte,
            $_count;
    public function __construct(){
      parent::__construct();
    }
       public function insert($array=array()){

         $this->_query=$this->_db->prepare("insert into access values ('',?,?,?,?,?,?,?,?,?,?,?,?,0)");
            $this->_query->bind_param("sssssiiisssi",$array['name'],$array['option_more'],$array['section'],$array['marka'],$array['color'],$array['price'],$array['country'],$array['city'],$array['special'],$array['images'],$array['date'],$array['act']);
                if($this->_query->execute()){
                  return true;
                }

            return false;
       }
      public function edit($array=array()){

         $this->_query=$this->_db->prepare("update access set name_a=?,option_a=?,section_a=? , marka_a=? ,color_a=? ,price_a=?,country_a=?,city_a=?,special_a=?,images_a=?,act_a=? where id_a=?");
            $this->_query->bind_param("sssssiiissii",$array['name'],$array['option_more'],$array['section'],$array['marka'],$array['color'],$array['price'],$array['country'],$array['city'],$array['special'],$array['images'],$array['act'],$array['id']);
                if($this->_query->execute()){
                  return true;
                }

            return false;
       }
    public function getAll(){
      $sql=$this->_db->query("select * from access ");
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
      $sql=$this->_db->query("select * from access where  id_a = $id ");
        if($sql){
            $rows=array();

           $array=$sql->fetch_assoc();

          return  $array;
        }
        return false;
    }
   public function remove($id){
       $mysql=$this->_db->prepare("delete from access where id_a = ?");
       $mysql->bind_param("i",$id);
        if( $mysql->execute()){
          return true;
        }
        return false;
     }



  }

?>