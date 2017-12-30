<?php
  class usersModel extends models{
    private $_query;
    private $_iduser;
    private $_resulte;
        public function __construct($user='')
            {
                parent::__construct();
                if(!$user){
                    $this->_iduser=session::get(system::get('session/session_name'));
                    $this->find($this->_iduser);
                } else{
                   $this->find($user);
                }

            }
     public  function register($value=array()){
            //var_dump("expression");die;
            $_query=$this->_db->prepare("insert into users  values('',?,?,?,?,?,?,?,?,?,?,?,?,'') ");
            $_query->bind_param("ssssississsi",
            $value['username'],
            $value['password'],
            $value['salt'],
            $value['date'],
            $value['group'],
            $value['firstname'],
            $value['lastname'],
            $value['age'],
            $value['mobile'],
            $value['telphone'],
            $value['email'],
            $value['lastnews']
            );
          if($_query->execute())
          return true;
          else
          return false;
       }
  public function find($id){
    $nameuser=is_numeric($id)?'id_u':'username';
     $id= $this->_db->real_escape_string($id);

    $query=$this->_db->query("select * from users where $nameuser = '$id'");

    if($query){
      $this->_resulte= $query->fetch_assoc();
    }
    return $this;
  }
  public function session_user($id){
    $id=(int)$id;
        $sql=$this->_db->query("select * from users_session where user_id=$id");
        if($sql){
        return $sql->fetch_assoc();
        }
  }
  public function insert_session($id,$hash){
    $sql=$this->_db->prepare("insert into users_session values ('',?,?)");
    $sql->bind_param("is",$id,$hash);
    if($sql->execute()){
      return true;
    }
    return false;
  }
  public function resulte(){
     return $this->_resulte;
  }

  }

?>