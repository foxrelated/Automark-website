<?php
  class orderModel extends models{
  private $_query;

       public function add($values=array()){


             $this->_query=$this->_db->prepare("insert into order_cars values ('',?,?,?,?)");
           $this->_query->bind_param("sssi",
                        $values['name'],
                        $values['code'],
                        $values['subject'],
                        $values['status']
           );
            if($this->_query->execute()){
                  return true;
                }

            return false;
       }

      public function getAll(){
      $sql=$this->_db->query("select * from   order_cars by id_c desc");
        if($sql){
            $rows=array();

            while($array=$sql->fetch_array()){
                  $rows[]=$array;
            }
          return  $rows;
        }
        return false;
    }
     public function getId($id,$act=null){
	 $add=(isset($act) and $act=='on')?" and act_c = 1":'';
       $id=(int)$id;
      $sql=$this->_db->query("select * from cars where id_c =$id $add limit 1 ");
        if($sql){



           $rows=$sql->fetch_assoc();
          return  $rows;
        }
        return false;
    }




  }

?>