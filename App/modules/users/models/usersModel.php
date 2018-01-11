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
            $_query=$this->_db->prepare("insert into users  values(0,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?) ");
            $_query->bind_param("ssssississsisis",
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
            $value['lastnews'],
            $value['id_face'],
            $value['act'],
            $value['image_u']
            );
            
          if($_query->execute())
          return $this->_db->insert_id;
          else
		  echo $this->_db->error;
          return false;
       }
  public function actUser($value=array()){
    $nameuser=is_numeric($value['id'])?'id_u':'username';
    $query=$this->_db->prepare("update users set act_u=?,group_u=? where $nameuser=?");
    $query->bind_param("iis",$value['act'],$value['group'],$value['id']);
     if($query->execute())
          return true;
            else
          return false;
  }
   public function edit_image($values=array()){
               $this->_query=$this->_db->prepare("update  users set  image_u=?
						where id_u = ?
					");
              $this->_query->bind_param("si",$values['image'],$values['id']);
              if($this->_query->execute()){
                  return true;
              }
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
   public function find_face($id){
     $id= $this->_db->real_escape_string($id);

    $query=$this->_db->query("select * from users where option_u = '$id'");

    if($query){
     $ww= $query->fetch_assoc();
    }
    return $ww;
  }
   public function findName($id,$name){
    $nameuser=is_numeric($id)?'id_u':'username';
     $id= $this->_db->real_escape_string($id);

    $query=$this->_db->query("select * from users where $nameuser = '$id'");

    if($query){
      $this->_resulte= $query->fetch_assoc();
    }
    return $this->_resulte[$name];
  }
  public function findphone($id,$name){
    $nameuser=is_numeric($id)?'id_u':'username';
     $id= $this->_db->real_escape_string($id);

    $query=$this->_db->query("select * from users where $nameuser = '$id'");

    if($query){
      $this->_resulte= $query->fetch_assoc();
    }
    return $this->_resulte[$name];
  }
  
    public function getAll(){
	
    $query=$this->_db->query("select * from users");
      $arr=array();
    if($query){

      while($rows=$query->fetch_assoc()){
        $arr[]=$rows;

      }
    }
    return $arr;
  }
  public function updateUser($value=array()){
        $this->_query=$this->_db->prepare("update  users set
                         username   = ? ,
                         group_u    = ? ,
                         name_u     = ? ,
                         lastname_u = ? ,
                         age_u      = ? ,
                         mobile_u   = ? ,
                         email_u    = ? ,
                         lastnews_u = ? ,
                         act_u      = ?
                     where id_u     = ?
              ");
            $this->_query->bind_param("ssssissiii",
                      $value['username'],
                      $value['group'],
                      $value['firstname'],
                      $value['lastname'],
                      $value['age'],
                      $value['mobile'],
                      $value['email'],
                      $value['lastnews'],
                      $value['act'],
                      $value['id']
            );
          if($this->_query->execute())
          return true;
          else
          return false;

  }
   public function edit($value=array()){
        $this->_query=$this->_db->prepare("update  users set
                         name_u     = ? ,
                         lastname_u = ? ,
                         age_u      = ? ,
                         mobile_u   = ? ,
                         email_u    = ? ,
                         lastnews_u = ? 

                     where id_u     = ?
              ");
            $this->_query->bind_param("ssissii",

                      $value['firstname'],
                      $value['lastname'],
                      $value['age'],
                      $value['mobile'],
                      $value['email'],
                      $value['lastnews'],
                      $value['id']
            );
          if($this->_query->execute())
          return true;
          else
          return false;

  }
  public function  chPassword($value=array()) {
     $_query=$this->_db->prepare("update  users set
                         password   = ?
                         where id_u     = ?
              ");
            $_query->bind_param("si",$value['password'],$value['id']);
          if($_query->execute())
          return true;
          else
          return false ;
  }
  public function getGroup(){
          $query=$this->_db->query("select * from groups");
      $arr=array();
    if($query){

      while($rows=$query->fetch_assoc()){
        $arr[]=$rows;

      }
    }
    return $arr;
  }

    public function  editgroup($value=array()) {
     $_query=$this->_db->prepare("update  groups set
                         name_g   = ?
                         where id_g     = ?
              ");
            $_query->bind_param("si",$value['name'],$value['id']);
          if($_query->execute())
          return true;
          else
          return false ;
  }
   public function GroupId($id){
     $id=(int)$id ;
          $query=$this->_db->query("select * from groups where id_g=$id");

    if($query){
          $rows=$query->fetch_assoc();
       return $rows;
      }
      return false;
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

    public function insert_active($value){
      
    $sql=$this->_db->prepare("insert into code_active values (0,?,?,?,?)");
    
    $sql->bind_param("sssi",$value['user'],$value['code'],$value['type'],$value['timeend']);
    
    if($sql->execute()){
      return true;
    }
    return false;
  }
    public function selectActive($value){
    $user=$value['user'];
    $code=$value['code'];
        $sql=$this->_db->query("select * from code_active where user_a='$user' and code_a='$code'");
        if($sql){
        return $sql->num_rows;
        }
  }
   public function addPermis($name,$code){
    $sql=$this->_db->prepare("insert into permis values ('',?,?)");
    $sql->bind_param("ss",$name,$code);
    if($sql->execute()){
      return true;
    }
    return false;
  }


  public function resulte(){
     return $this->_resulte;
  }
     public function remove($id){
       $mysql=$this->_db->prepare("delete from users where id_u= ?");
       $mysql->bind_param("i",$id);
        if( $mysql->execute()){
          return true;
        }
        return false;
     }
      public function removeActive($id){
       $mysql=$this->_db->prepare("delete from code_active where user_a= ?");
       $mysql->bind_param("s",$id);
        if( $mysql->execute()){
          return true;
        }
        return false;
     }
  }

?>