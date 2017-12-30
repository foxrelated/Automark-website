<?php
  class categoryModel extends models{
  private $_query;

       public function addCategory($values=array()){


             $this->_query=$this->_db->prepare("insert into category values('',?,?,'') ");
           $this->_query->bind_param("ss",
                        $values['name'],
                        $values['form']

           );
            if($this->_query->execute()){
                  return true;
                }

            return false;
       }
  public function getCategory($code=''){
    $add=(isset($code['id']) and $code['id']!='')? " and id_ss='".$code['id']."'":'';
            $sql=$this->_db->query("select * from category where id_ss!='' $add  ");
              if($sql){
                  $rows=$sql->fetch_assoc()  ;
                return  $rows;
              }
              return false;
    }
   public function getAll($code=''){
    $add=(isset($code['id']) and $code['id']!='')? " and id_ss='".$code['id']."'":'';
            $sql=$this->_db->query("select * from category where id_ss!='' $add  ");
              if($sql){
                  $rows=array();

            while($array=$sql->fetch_array()){
                  $rows[]=$array;
            }
          return  $rows;

              }
              return false;
    }
}

?>