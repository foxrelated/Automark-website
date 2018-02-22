<?php
  class registerController extends controller{

   protected $_model;
   protected $_global;
   private $_chat1;

    function __construct(){
       parent::__construct();
        $this->_model=  $this->loadModel('users');
        $this->_global=  $this->loadModel('global','default');
        $this->_shows=$this->loadModel("shows",'admin');
        $this->_shows = $this->_shows->getAll();
        $this->_view->assign('_shows',$this->_shows);
        $this->_chat1=$this->loadModel('newchat','chat');
$this->_user1=$this->loadModel('users','users');
   $id_user=session::get(system::get("session/session_name"));
   $user = $this->_user1->findName($id_user,"username");
   $this->_view->assign('_fromuser',$user);
   $this->_view->assign('_chat', $this->_chat1->getAll(array('from'=>$user,'listGroup'=>1)));
    }
    function index(){


       

    if(isset($_POST['insert']) and $_POST['insert']==1){

      if($this->_token->check($this->_input->get('token'))){

          $this->_validate->check($_POST,
          array(
                  'username'=>array(
                         'required'=>true ,
                         'min'=>3 ,
                         'max'=>20 ,
                         'unique'=>'users' ,
                         'name_id'=>'username'
                  ),
                  'password'=>array(
                        'required'=>true ,
                        'min'=>6
                  ),
                  'rpassword'=>array(
                        'required'=>true ,
                        'matches'=>true ,

                  ),
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
                        'required'=>true,
                        'min'=>3,
                         'int'=>true,
                        'max'=>50)
                   ,
                  'telphone'=>array(
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
                        'emailvar'=>true  ,
                        'unique'=>'users' ,
                        'name_id'=>'email_u'
                        ),
                   'using'=>array(
                          'required'=>true
                        ),
                   'lastnews'=>array(
                          'required'=>false
                        ),
                   'token'=>array(
                        'required'=>true
                   )
                  )
          );

            if($this->_validate->passed()){

              $firstname=$this->_securty->tities($this->_input->get('firstname'));
              $lastname=$this->_securty->tities($this->_input->get('lastname'));
              $mobile=$this->_securty->getNum($this->_input->get('mobile'));
              //$mobilecode=$this->_securty->getNum($this->_input->get('mobilecode'));
              $lastnews=$this->_securty->getNum($this->_input->get('lastnews'));
              $username=$this->_securty->tities($this->_input->get('username'));
              $email=$this->_securty->tities($this->_input->get('email'));



               $salt=$this->_hash->salt('32');
               $sql=array(
                        'username'=> $this->_securty->tities($this->_input->get('username')),
                        'password'=>$this->_hash->make($this->_input->get('password'),$salt),
                        'email'=>$this->_input->get('email'),
                        'firstname'=> $this->_securty->tities($this->_input->get('firstname')),
                        'lastname'=> $this->_securty->tities($this->_input->get('lastname')),
                        'age'=>$this->_input->get('age'),
                        'mobile'=>$this->_input->get('mobile'),
                        'telphone'=>$this->_input->get('telphone'),
                        'using'=>$this->_input->get('using'),
                        'lastnews'=>$this->_input->get('lastnews'),
                        'salt'=>$salt,
                        'date'=>date("y-m-d H:i:s"),
                        'group'=>0,
						'id_face'=>"",
						'image_u'=>"",
                        'act'=>0
               );

                $last_id=$this->_model->register($sql);
//                // send the verification email
//                if($last_id){
//                 $name=$firstname.' '.$lastname;
//                  $title=_t("تفعيل حسابك  ");
//                   $urlactive=$this->_hash->unique();
//                     $msg="لتفعيل حسابك يرجى الذهاب الى الرابط التالى<br>
//                           <a href='".system::_data("url_site")."users/register/act/".$last_id."/".$urlactive."'>من هنا</a>
//                            <br>
//                            او نسخ الرابط التالى  <br>
//                            ".system::_data("url_site")."users/register/act/".$last_id."/".$urlactive;
//                    $valueemail=array(
//                        'name'=>'Automark',//$name,
//                        'email'=>system::_data("email_admin"),
//                        'femail'=>$email,
//                        'title'=>system::_data("title_site"),
//                        'msg'=>nl2br($msg)
//                    );
//
//
//                      $value_active=array(
//                        'user'=>$last_id,
//                        'code'=> $urlactive,
//                        'type'=>'activeuser',
//                        'timeend'=>time(),
//                      );
//
//
//                         if($this->_model->insert_active($value_active)){
//                         if($this->_func->sendMail($valueemail)){
//                             $this->_view->assign('_msg',_t("تم ارسال رسالة تفعيل الى بريدك الالكتروني قم بالضغط على الرابط الموضح فيه ليتم تفعيل الحساب "));
//                        }
//                        } else{
//                           throw new Exception(sprintf(_t('Error Database  %s '),'active'));
//                         }
//
//
//
//
//                }else{
//                    throw new Exception(sprintf(_t('Error Database  %s '),'register users'));
//                }
            }else{
                $this->_view->assign('get',array_filter($_POST));
                $this->_view->assign('error',$this->_validate->errors());

            }
            }
           }



        // $this->_view->sider('sider');
        $this->_view->tmpDir('register','register',array('tmp'=>true));
    }
   public function act($user='',$code=''){
        if(isset($user) and !empty($user) and isset($code) and !empty($code) ){
             if($this->_model->selectActive(array("user"=>$user,'code'=>$code))>0){

             if($this->_model->actUser(array('act'=>1,'group'=>1,'id'=>$user))){
                         $this->_model->removeActive($user);
                        $this->_view->tmpDir('active','active',array('tmp'=>true));
                    }else{
                        throw new Exception(sprintf(_t('Error Database  %s '),'register active'));
                    }

             }else{
               session::redir(404);
             }

     } else{
               session::redir(404);
             }

   }
  }
?>