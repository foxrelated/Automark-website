<?php
  class usersController extends controller{
    private $_users;
    public function __construct(){
        parent::__construct();
       $this->_view->setStyle('admin');
       $this->_view->assign('_title','الصفحه الرئيسية');
       $this->_view->assign('_page','ادارة الاعضاء');

       $this->_users=$this->loadModel('users','users');

       $this->_view->assign('data_users',$this->_users);


    }
    public function index(){

        $this->_view->tmpDir('index');

    }

      public function sendpasslink($id){
          //$users = $this->_users->getAll();
          $this->_users->find($id);
          $user = $this->_users->resulte();
          if($user) {
              $name = $user['name_u'] . ' ' . $user['lastname_u'];
              $username = $user['username'];
              $email = $user['email_u'];;
              $title = _t("طريقة استرجاع الباسورد");
              $urlactive = $this->_hash->unique();
              $msg = "لسترجاع  الحساب يرجى زيارة الرابط التالى <br>
                           <a href='" . system::_data("url_site") . "users/login/newpass/" . $username . "/" . $urlactive . "'>الرابط التالى  </a>
                            <br>
                            او نسخ الرابط التالى  <br>
                            " . system::_data("url_site") . "users/login/newpass/" . $username . "/" . $urlactive;
              $valueemail = array(
                  'name' => $name,
                  'email' => 'info@automark.com',
                  'femail' => $email,
                  'title' => "Automark.com ",
                  'msg' => nl2br($msg)
              );


              $value_active = array(
                  'user' => $username,
                  'code' => $urlactive,
                  'type' => 'repass',
                  'timeend' => time(),
              );
              if ($this->_users->insert_active($value_active)) {
                  if ($this->_func->sendMail($valueemail)) {
                      echo 'reset password email sent sucessfully';
                  }
              } else {
                  echo 'failed to send the reset pass email';
              }
          }
          else
          {
              echo "user not found";
          }
      }

     public function edit($id){
         $this->_view->assign('_sub','تعديل بيانات  العضو');
         $this->_users->find($id);

         $res=$this->_users->resulte();

     if($this->_input->get('edit')==1){

      if($this->_token->check($this->_input->get('token'))){

          $this->_validate->check($_POST,
          array(
                    'username'=>array(
                         'required'=>true ,
                         'min'=>3 ,
                         'max'=>20
                  ),
                  'password'=>array(
                        'required'=>false ,
                        'min'=>6
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
                        'required'=>false,
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
                        'required'=>true
                        ),
                   'lastnews'=>array(
                          'required'=>false
                        ),
                   'act'=>array(
                          'required'=>false
                        )
                        ,
                   'group'=>array(
                          'required'=>true
                        )
                  )
          );

                if($this->_validate->passed()){


                   if($this->_input->get('password')!=''){
                         $password=$this->_hash->make($this->_input->get('password'),$res['salt_u']);
                           $sqlpass=array(
                            'password'=> $password ,
                            'id'=> $id
                           ) ;
                         $this->_users->chPassword($sqlpass);
                    }
                        $sqlArray=array(
                        'username'=> $this->_securty->tities($this->_input->get('username')),
                        'email'=>$this->_input->get('email'),
                        'firstname'=> $this->_securty->tities($this->_input->get('firstname')),
                        'lastname'=> $this->_securty->tities($this->_input->get('lastname')),
                        'age'=>$this->_input->get('age'),
                        'mobile'=>$this->_input->get('mobile'),
                        'telphone'=>$this->_input->get('telphone'),
                        'lastnews'=>$this->_input->get('lastnews'),
                        'group'=>$this->_input->get('group'),
                        'act'=>$this->_input->get('act'),
                        'id'=>$id
                        );
                     if($this->_users->updateUser($sqlArray)){
                        $this->_view->assign('_msg',"تم التعديل  بنجاح");
                     }else{
                         $this->_view->assign('_msg',"حاول مره اخرى");
                     }

                    }else{

                      $this->_view->assign('error',$this->_validate->errors());
                }
            }
           }
          $this->_users->find($id);
        $this->_view->assign('dataId', $this->_users->resulte());
        $this->_view->tmpDir('edit');

    }

      public function  group(){


          $this->_view->tmpDir("group");
      }

     public function  groupedit($id){

             $this->_view->assign('_sub','تعديل بيانات  العضو');
         $this->_users->find($id);

         $res=$this->_users->resulte();

     if($this->_input->get('edit')==1){

      if($this->_token->check($this->_input->get('token'))){

          $this->_validate->check($_POST,
          array(
                    'name'=>array(
                         'required'=>true
                  ))
          );
                if($this->_validate->passed()){
                        $sqlArray=array(
                        'name'=> $this->_securty->tities($this->_input->get('name')),
                        'id'=>$id
                        );
                     if($this->_users->editgroup($sqlArray)){
                        $this->_view->assign('_msg',"تم التعديل  بنجاح");
                     }else{
                         $this->_view->assign('_msg',"حاول مره اخرى");
                     }

                    }else{

                      $this->_view->assign('error',$this->_validate->errors());
                }
            }
           }

            $this->_view->assign("group",$this->_users->GroupId($id)) ;
            $this->_view->tmpDir("group_edit");
      }
       public function  addgroup(){


          $this->_view->tmpDir("add_group");
      }
       public function  addpermis(){
                $this->_view->assign('_sub','اضافة صلاحيات  جديده');

            if($this->_input->get('add')==1){

      if($this->_token->check($this->_input->get('token'))){

          $this->_validate->check($_POST,
          array(

                  'name'=>array(
                        'required'=>true
                  ),
                   'code'=>array(
                        'required'=>true
                   )
                  )
          );

                if($this->_validate->passed()){

                     if($this->_users->addPermis($this->_input->get('name'),$this->_input->get('code'))){
                        $this->_view->assign('_msg',"تم الاضافة بنجاح");
                     }

                    }else{
                      $this->_view->assign('get',array_filter($_POST));
                      $this->_view->assign('error',$this->_validate->errors());
                }
            }
           }


          $this->_view->tmpDir("add_permis");
      }
      public function remove($id){

                  if($this->_users->remove($id)){
                      session::redir('admin/users/');
                  }


    }
  }

?>