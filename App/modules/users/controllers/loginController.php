<?php
  class loginController extends controller{

   protected $_model;
   protected $_global;
   private $_chat1;

    function __construct(){
       parent::__construct();
        $this->_model=  $this->loadModel('users');
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

    function index($admin=null){

    if($this->_input->get('login')==1){

      if($this->_token->check($this->_input->get('token'))){

          $this->_validate->check($_POST,
          array(
                  'username'=>array(
                         'required'=>true,
                         'loginuser'=>'users' ,
                         'name_id'=>array('username','email_u','mobile_u')
                  ),
                  'password'=>array(
                        'required'=>true
                  )
                  )
          );

            if($this->_validate->passed()){

              $remember=($this->_input->get("remember") == 'on')?true:false;
              $resulte=$this->_validate->resulte();
                if($resulte['password'] == ''){
                    // first time to login, so we have to save his password
                    $salt = $this->_hash->salt('32');
                    $password = $this->_hash->make($this->_input->get('password'),$salt);
                    $resulte['salt_u'] = $salt;
                    $resulte['password'] = $password;
                    $userArr = array(
                        'password' => $resulte['password'],
                        'salt' => $resulte['salt_u'],
                        'id' => $resulte['id_u']);
                    $updatePasswordResult = $this->_user1->updateUserPassword($userArr);
                }
              $salt=$resulte['salt_u'];
              $password=$this->_hash->make($this->_input->get('password'),$salt);
              $username=$this->_securty->tities($this->_input->get('username'));
// and $username==$resulte['username'];
               if($password == $resulte['password']){
                   if($remember==true){
                        $hash=$this->_hash->unique();
                        $hashcheck=$this->_model->session_user($resulte['id_u']);
                         if(!count($hashcheck)){
                           $this->_model->insert_session($resulte['id_u'],$hash);
                         }else{
                            $hash=$hashcheck['hash_us'];
                         }
                  cookies::put(system::get("remember/cookie_name"),$hash,system::get("remember/cookie_expire"));
                   }
                  session::put(system::get("session/session_name"),$resulte['id_u']);
                  $dirGo=(isset($admin) and $admin=='cp')?'admin':'index';
                  session::redir($dirGo);
                  
               }else{
                  $this->_view->assign('error',array("msg"=>_t("الباسورد خطا")));
               }
            }else{
                $this->_view->assign('get',array_filter($_POST));
                $this->_view->assign('error',$this->_validate->errors());

            }
            }
           }


           if(isset($admin) and $admin=='cp'){
                $this->_view->setStyle('admin');
                $this->_view->tmpDir('login','login',array('other'=>true));
           }else{
            $this->_view->tmpDir('login','login',array('tmp'=>true));
            }

    }

      function hashPass(){
          $password = $this->_input->get('password');
          if($password) {
              $this->_validate->check($_POST,
                  array(
                      'username' => array(
                          'required' => true,
                          'loginuser' => 'users',
                          'name_id' => array('username', 'email_u', 'mobile_u')
                      ),
                      'password' => array(
                          'required' => true
                      )
                  )
              );


              $resulte = $this->_validate->resulte();
              if ($resulte['password'] == '') { // generate pass hash to register
                  $salt = $this->_hash->salt('32');
                  $hashed_password = $this->_hash->make($this->_input->get('password'), $salt);
                  echo json_encode(['password' => $password,
                      'hashed_password' => $hashed_password,
                      'salt' => base64_encode($salt)]);
                  return;
              } else { // generate has pass for login
                  $salt = $resulte['salt_u'];
                  $hashed_password = $this->_hash->make($password, $salt);
                  echo json_encode(['password' => $password,
                      'hashed_password' => $hashed_password,
                      'salt' => base64_encode($salt)]);
                  return;
              }

          } else
            echo json_encode(['error'=>'password is empty']);
          return;
      }

    public function lostpasword(){

    if($this->_input->get('send')==1){

      if($this->_token->check($this->_input->get('token'))){

          $this->_validate->check($_POST,
          array(
                  'email'=>array(
                         'required'=>true,
                         'emailvar'=>true  ,
                         'loginuser'=>'users' ,
                         'name_id'=>'email_u'
                  ) ,
                   'captcha'=>array(
                        'required'=>true,
                        'min'=>3,
                        'max'=>5,
                        'captcha'=>true
                   )
                  )
          );

            if($this->_validate->passed()){
              $resulte= $this->_validate->resulte();


                  $name=$resulte['name_u'].' '.$resulte['lastname_u'];
                  $username=$resulte['username'];
                  $email=$resulte['email_u'];;
                  $title=_t("طريقة استرجاع الباسورد");
                   $urlactive=$this->_hash->unique();
                     $msg="لسترجاع  الحساب يرجى زيارة الرابط التالى <br>
                           <a href='".system::_data("url_site")."users/login/newpass/".$username."/".$urlactive."'>الرابط التالى  </a>
                            <br>
                            او نسخ الرابط التالى  <br>
                            ".system::_data("url_site")."users/login/newpass/".$username."/".$urlactive;
                    $valueemail=array(
                        'name'=>'AutoMark',
                        'email'=>'info@automark.com',
                        'femail'=>$email,
                        'title'=>"Automark.com ",
                        'msg'=>nl2br($msg)
                    );


                      $value_active=array(
                        'user'=>$username,
                        'code'=> $urlactive,
                        'type'=>'repass',
                        'timeend'=>time(),
                      );
                     if($this->_model->insert_active($value_active)){
                         if($this->_func->sendMail($valueemail)){
                             $this->_view->assign('_msg',_t("تم الارسال بنجاح"));
                        }
                        } else{
                            $this->_view->assign('_msg',_t("حاول مره اخرى"));
                         }

                    }else{
                        $this->_view->assign('get',array_filter($_POST));
                        $this->_view->assign('error',$this->_validate->errors());

                    }
                }

       }
     $this->_view->tmpDir('lostpassword','lost',array('tmp'=>true));

}
    public function newpass($user=null,$code=null){

     if(isset($user) and !empty($user) and isset($code) and !empty($code) ){
             if($this->_model->selectActive(array("user"=>$user,'code'=>$code))>0){

              if(isset($_POST['edit']) and $_POST['edit']==1){

      if($this->_token->check($this->_input->get('token'))){

          $this->_validate->check($_POST,
          array(
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
                 $this->_model->find($user);
                 $_res=$this->_model->resulte();


                $password=$this->_hash->make($this->_input->get('password'),$_res['salt_u']);
                  $sqlpass=array(
                            'password'=> $password ,
                            'id'=> $_res['id_u']
                           ) ;

                         if($this->_model->chPassword($sqlpass)){

                         $this->_model->removeActive($_res['username']);
                             $this->_view->assign("_msg","تم تغير الباسورد بنجاح") ;

                    }else{
                        throw new Exception(sprintf(_t('Error Database  %s '),'register users'));
                    }

            }else{

                $this->_view->assign('error',$this->_validate->errors());

            }
            }
           }


                 $this->_view->tmpDir('newpass','newpass',array('defualt'=>true));

             }else{
               session::redir(404);
             }

     } else{
               session::redir(404);
             }



    }
    public function logout(){
      if(session::destroy()){
          session::redir('index');
      }
    }

  }
?>