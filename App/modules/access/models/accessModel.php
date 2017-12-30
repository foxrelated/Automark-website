<?php
  class accessModel extends models{
    private $_query,
            $_resulte,
            $_count;
    public function __construct(){
      parent::__construct();
    }

    public function getAll($act='',$limit=''){
      $add='';
      $add.=($act=='on')?" and act_a=1 ":'';
      $add.=(isset($limit) and $limit!='' and is_numeric($limit) and $limit>0)?" limit $limit  ":'';
      $add.=(isset($limit['limit_end']) and $limit['limit_end']!='' and is_numeric($limit['limit_end']))?" limit ".$limit['limit_start']." ,".$limit['limit_end']:'';

      $sql=$this->_db->query("select * from access where id_a!='' $add");
        if($sql){
            $rows=array();

            while($array=$sql->fetch_array()){
                  $rows[]=$array;
            }
          return  $rows;
        }
        return false;
    }
       public function getId($id,$act=''){
        $id=(int)$id;
        $add='';
        $add.=(isset($act) and $act=='on')?" and act_a=1 ":'';
      $sql=$this->_db->query("select * from access where  id_a = $id  $add");
        if($sql){
            $rows=array();

           $array=$sql->fetch_assoc();

          return  $array;
        }
        return false;
    }
          public function updateVzt($values=array()){
               $_query=$this->_db->prepare("update  access set  vzt_a=vzt_a + 1
						where id_a = ?
					");
              $_query->bind_param("i",$values['id']);
              if($_query->execute()){
                  return true;
              }
            return false;
       }
  }

?>