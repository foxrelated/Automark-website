<?php
  class indexController extends controller{
    private $_mail;
   protected $_pages;
   protected $_option;
    function __construct(){
       parent::__construct();
         $this->_pages=$this->loadModel("pages",'admin');
         $this->_option=$this->loadModel("option",'admin');
         $this->_mail=new phpmail;
    }

    public function index(){
      var_dump("expression");die;
      $this->_view->tmpDir('index','',array('tmp'=>true));
    }
    public function id($id){
      $id=(int)$id;

      $this->_view->assign("aboutus",$this->_pages->getId($id));
      $this->_view->tmpDir('page','',array('tmp'=>true));
    }
    public function aboutus(){
        $this->_view->assign("aboutus",$this->_pages->getId("2"));
        $this->_view->assign("roya",$this->_pages->getId("3"));
        $this->_view->tmpDir('aboutus','',array('tmp'=>true));
    }

    public function ads(){


            if($this->_input->get('send')==1){

      if($this->_token->check($this->_input->get('token'))){

          $this->_validate->check($_POST,
          array(
                  'name'=>array(
                        'required'=>true,
                         'min'=>5,
                         'max'=>50
                  ),'jop'=>array(
                        'required'=>true,
                         'min'=>5,
                         'max'=>50
                  ),'campany'=>array(
                        'required'=>false,
                         'min'=>5,
                         'max'=>50
                  ),'campnyn'=>array(
                        'required'=>false,
                         'min'=>5,
                         'max'=>50
                  ),'email'=>array(
                         'required'=>true,
                         'min'=>5,
                         'max'=>50,
                         'emailvar'=>true
                  ),'mobile'=>array(
                        'required'=>false,
                         'min'=>5,
                         'max'=>20,
                         'int'=>true,
                   ),'sitename'=>array(
                        'required'=>false ,
                        'min'=>5,
                        'max'=>50,

                   ),'captcha'=>array(
                        'required'=>true,
                        'min'=>3,
                        'max'=>5,
                        'captcha'=>true
                   )
                  )
          );

                if($this->_validate->passed()){
                  $name=$this->_input->get('name');
                  $jop=$this->_input->get('jop');
                  $campany=$this->_input->get('campany');
                  $campnyn=$this->_input->get('campnyn');
                  $email=$this->_input->get('email');
                  $mobile=$this->_input->get('mobile');
                  $sitename=$this->_input->get('sitename');

                     $msg="
                        اعلن لدينا <br>
                          الاسم : ".$name."<br>
                         الوظيفة :".$jop." <br>
                         الشركة :".$campany." <br>
                         نشاط الشركة :".$campnyn." <br>
                         الجوال :".$mobile." <br>
                         البريد الالكترونى :".$email." <br>
                         الموقع الالكترونى :".$sitename." <br>
                    ";
                    $valueemail=array(
                        'name'=>$name,
                        'email'=>$email,
                        'femail'=>'info@mobay3a.com',
                        'title'=>'Mobay3a.com',
                        'msg'=>nl2br($msg)
                    );
                         if($this->_func->sendMail($valueemail)){
                             $this->_view->assign('_msg',_t("تم الارسال بنجاح"));
                         }else{
                            $this->_view->assign('_msg',_t("حاول مره اخرى"));
                         }

                    }else{
                        $this->_view->assign('get',array_filter($_POST));
                      $this->_view->assign('error',$this->_validate->errors());
                }
            }
           }


        $this->_view->assign("data",$this->_pages->getId("4"));
        $this->_view->tmpDir('a3len','',array('tmp'=>true));
    }
     public function contact(){

            if($this->_input->get('send')==1){

      if($this->_token->check($this->_input->get('token'))){

          $this->_validate->check($_POST,
          array(
                  'email'=>array(
                         'required'=>true,
                         'min'=>5,
                         'max'=>50,
                         'emailvar'=>true

                  ),
                  'name'=>array(
                        'required'=>true,
                         'min'=>5,
                         'max'=>50
                  ),
                   'mobile'=>array(
                        'required'=>false,
                         'min'=>5,
                         'max'=>20,
                         'int'=>true,
                   ),
                   'title'=>array(
                        'required'=>true ,
                        'min'=>5,
                        'max'=>50,

                   ),
                   'subject'=>array(
                        'required'=>true,
                        'min'=>5,
                        'max'=>200,
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
                  $name=$this->_input->get('name');
                  $email=$this->_input->get('email');
                  $mobile=$this->_input->get('mobile');
                  $title=$this->_input->get('title');
                  $subject=$this->_input->get('subject');
                    $msg="
                             اتصل بنا <br>
                          الاسم : ".$name."<br>
                         الجوال :".$mobile." <br>
                         بريد المرسل :".$email." <br>
                         العنوان :".$title." <br>
                         الموضوع :".$subject." <br>
                    ";
                    $valueemail=array(
                        'name'=>$name,
                        'email'=>$email,
                        'femail'=>'info@mobay3a.com',
                        'title'=>'mobay3a.com',
                        'msg'=>nl2br($msg)
                    );
                         if($this->_func->sendMail($valueemail)){
                             $this->_view->assign('_msg',_t("تم الارسال بنجاح"));
                         }else{
                            $this->_view->assign('_msg',_t("حاول مره اخرى"));
                         }

                    }else{
                        $this->_view->assign('get',array_filter($_POST));
                      $this->_view->assign('error',$this->_validate->errors());
                }
            }
           }

        $this->_view->assign("data",$this->_pages->getId("5"));
        $this->_view->tmpDir('contact','',array('tmp'=>true));
    }
	public function offres(){
	      $this->_view->assign('ads_big',$this->_func->jsonFeildArray($this->_option->getCode('offers','option_o'),'size','big'));
	      $this->_view->assign('mediam1',$this->_func->jsonFeildArray($this->_option->getCode('offers','option_o'),'size','mediam1'));
	      $this->_view->assign('mediam2',$this->_func->jsonFeildArray($this->_option->getCode('offers','option_o'),'size','mediam2'));
	      $this->_view->assign('mediam3',$this->_func->jsonFeildArray($this->_option->getCode('offers','option_o'),'size','mediam3'));
	      $this->_view->assign('mediam4',$this->_func->jsonFeildArray($this->_option->getCode('offers','option_o'),'size','mediam4'));
		  $this->_view->assign("data",$this->_option->getCode("offers",'option_o'));
		  $this->_view->tmpDir("offers",'',array('tmp'=>true));
	}

  }
?>