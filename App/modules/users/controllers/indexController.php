<?php
  class indexController extends controller{
   private $idUser;
   private $_user;
   private $_res;
    function __construct(){
       parent::__construct();
        $this->_user=  $this->loadModel('users');
        $this->_res=  $this->_user->resulte();
        $this->idUser=  session::get(system::get("session/session_name"));
        $this->_view->assign("_user",$this->_res);
        $this->_shows=$this->loadModel("shows",'admin');
        $this->_shows = $this->_shows->getAll();
        $this->_view->assign('_shows',$this->_shows);
        $this->_chat=$this->loadModel('newchat','chat');
$this->_user1=$this->loadModel('users','users');
   $id_user=session::get(system::get("session/session_name"));
   $user = $this->_user1->findName($id_user,"username");
   
   $this->_view->assign('_chat', $this->_chat->getAll(array('from'=>$user,'listGroup'=>1)));
    }
    public function index(){
            $this->_view->tmpDir("index",'',array('tmp'=>true));
    }

    public function profile(){


    if(isset($_POST['edit']) and $_POST['edit']==1){

      if($this->_token->check($this->_input->get('token'))){

          $this->_validate->check($_POST,
          array(

                  'firstname'=>array(
                        'required'=>true,
                        'min'=>3,
                        'max'=>50
                  ),

                  'lastname' => array(
                        'required'=>true,
                        'min'=>3,
                        'max'=>50
                  ),
                  'mobile'=>array(
                        'required'=>false,
                        'min'=>3,
                         'int'=>true,
                        'max'=>50)
                        ,

                  'age'=>array(
                        'required'=>false,
                        'int'=>true
                       )
                  ,
                  'email'=>array(
                        'required'=>true,
                        'min'=>3,
                        'emailvar'=>true
                        ),

                   'lastnews'=>array(
                          'required'=>false
                        )
                  )
          );

            if($this->_validate->passed()){
               $sql=array(
                        'email'=>$this->_input->get('email'),
                        'firstname'=> $this->_securty->tities($this->_input->get('firstname')),
                        'lastname'=> $this->_securty->tities($this->_input->get('lastname')),
                        'age'=>$this->_input->get('age'),
                        'mobile'=>$this->_input->get('mobile'),
                        'lastnews'=>$this->_input->get('lastnews') ,
                        'id'=>$this->idUser
               );
                if($this->_user->edit($sql)){
                    session::redir('users');
                }else{
                    throw new Exception(sprintf(_t('Error Database  %s '),'register users'));
                }
            }else{

                $this->_view->assign('error',$this->_validate->errors());

            }
            }
           }


      $this->_view->tmpDir("profile",'',array('tmp'=>true));
    }
     public function password(){

    if(isset($_POST['edit']) and $_POST['edit']==1){

      if($this->_token->check($this->_input->get('token'))){

          $this->_validate->check($_POST,
          array(

                  'oldpassword'=>array(
                        'required'=>true
                  ),
                  'password'=>array(
                        'required'=>true ,
                        'min'=>6
                  ),
                  'rpassword'=>array(
                        'required'=>true ,
                        'matches'=>true ,
                  )

                  )
          );

            if($this->_validate->passed()){

                $oldpassword=$this->_hash->make($this->_input->get('oldpassword'),$this->_res['salt_u']);
                if($oldpassword==$this->_res['password']){
                $password=$this->_hash->make($this->_input->get('password'),$this->_res['salt_u']);
                  $sqlpass=array(
                            'password'=> $password ,
                            'id'=>$this->_res['id_u']
                           ) ;

                         if($this->_user->chPassword($sqlpass)){
                             $this->_view->assign("_msg","تم تغير الباسورد بنجاح") ;
                    }else{
                        throw new Exception(sprintf(_t('Error Database  %s '),'register users'));
                    }
                }else{
                  $this->_view->assign("_msg","الباسورد الحالى غير صحيح") ;
                }
            }else{

                $this->_view->assign('error',$this->_validate->errors());

            }
            }
           }

         $this->_view->tmpDir("password",'',array('tmp'=>true));
    }

	 public function change_image(){


    if(isset($_POST['edit']) and $_POST['edit']==1){

      if($this->_token->check($this->_input->get('token'))){

          $this->_validate->check($_POST,
          array(

                  'imageuser'=>array(
                        'required'=>true
                  )
			)
          );

            if($this->_validate->passed()){
               $sql=array(
                        'image'=>$this->_input->get('imageuser'),
                        'id'=>$this->idUser
               );
                if($this->_user->edit_image($sql)){
                    //session::redir('users');
					  $this->_view->assign('_msg',_t("Uploaded successfully"));
                }else{
                    throw new Exception(sprintf(_t('Error Database  %s '),'register users'));
                }
            }else{

                $this->_view->assign('error',$this->_validate->errors());

            }
            }
           }


      $this->_view->tmpDir("upImage",'',array('tmp'=>true));
    }
  }
?>