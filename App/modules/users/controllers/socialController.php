<?php
  class socialController extends controller{


    function __construct(){
       parent::__construct();
        $this->_model=  $this->loadModel('users');
    }
    function index(){
   // session::destroy();


       if($this->_facebook->getToken()){
        $r=$this->_facebook->result();
        $t=$r->asArray();
            if($username=$this->_model->find_face($t['id'])){
                  session::put(system::get("session/session_name"),$username['id_u']);
                  session::redir('index');
            }else{

             $salt=$this->_hash->salt('32');
              $sql=array(
                        'username'=>$t['name'],
                        'password'=>$this->_hash->make($t['id'],$salt),
                        'email'=>$t['email'],
                        'firstname'=> $t['first_name'],
                        'lastname'=> $t['last_name'],
                        'age'=>'',
                        'mobile'=>'',
                        'telphone'=>'',
                        'using'=>'',
                        'lastnews'=>'',
                        'salt'=>$salt,
                        'date'=>date("y-m-d H:i:s"),
                        'id_face'=>$t['id'],
                        'group'=>0,
                        'act'=>1
               );

                if($id_user=$this->_model->register($sql)){
                        session::put(system::get("session/session_name"),$id_user);
                        session::redir('index');
                  }
           }
       }else{
             session::redir('users/login');
        }
    }

}
?>