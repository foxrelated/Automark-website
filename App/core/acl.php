<?php
  class acl{

  private $_iduser;
  private $_db;
  private $_resulte;
  private $_func;

    public function __construct($user=false){
      
      $this->_register=Registry::getInstancia();
      $this->_db=$this->_register->_db;
      $this->_func=$this->_register->_func;
       if(!$user){
                    $this->_iduser=session::get(system::get('session/session_name'));
                    $this->getUser($this->_iduser);
                } else{
                   $this->getUser($user);
                }
    }

private function getUser($id){
    $nameuser=is_numeric($id)?'id_u':'username';
     $id= $this->_db->real_escape_string($id);
    $query=$this->_db->query("select * from users where $nameuser = '$id'");
    if($query){
      $this->_resulte= $query->fetch_assoc();
    }
    return $this;
  }

    public function  _permis($pri){
            $id = $this->_resulte['group_u'];
        if($query=$this->_db->query("select * from groups where id_g= $id")){
           $rows=$query->fetch_assoc();
          // jsonArray
          return    $this->_func->jsonId($rows['permissions'],$pri);
        }
        return false;
    }
 }
?>