<?php
  class indexController extends controller{



    private $_city;
    private $_users;
    private $_option;
    private $_access;
    private $_cars;
    private $_typecar;
    private $_chat1;
  public function __construct(){
    parent::__construct();


   $this->_typecar=$this->loadModel("typecar","admin");
   $this->_access=$this->loadModel("access");
   $this->_users=$this->loadModel("users",'users');
   $this->_city=$this->loadModel('city','admin');
   $this->_option=$this->loadModel('option','admin');
   $this->_cars=$this->loadModel('cars','admin');
$this->_chat1=$this->loadModel('newchat','chat');
$this->_user1=$this->loadModel('users','users');
   $id_user=session::get(system::get("session/session_name"));
   $user = $this->_user1->findName($id_user,"username");
   $this->_view->assign('_fromuser',$user);
   $this->_view->assign('_chat', $this->_chat1->getAll(array('from'=>$user,'listGroup'=>1)));

   $this->_view->assign('_adscars', $this->_func->jsonFeild($this->_option->getCode('adsimg','option_o'),'dir','cars'));



   $this->_view->assign('_access', $this->_access);

   $this->_view->assign('_typecar', $this->_typecar);
   $this->_view->assign('_cars', $this->_cars);
   $this->_view->assign('_city', $this->_city);
   $this->_view->assign('_users', $this->_users);

  }
    public function index($num=''){

      $this->_view->assign('_title',_t("زينة و اكسسورات"));


             $countPag=2;
             $count=count($this->_access->getAll('on'));
              $num=(isset($num) and $num!='' and  is_numeric($num))?(int)$num:1;
               $countNumPage=ceil($count/$countPag)+1;
               if($num<$countNumPage){
            	     	$limitNext=($num-1)*$countPag;
            	 }else{
            		$limitNext=0;
            	 }
            $limit=array('limit_start'=>$limitNext,'limit_end'=>$countPag);
            $listPage=array('list'=>$num,'count'=>$countNumPage);
          $this->_view->assign('numPage', $listPage);


          $this->_view->assign('_accessRows', $this->_access->getAll('on',$limit));

      $this->_view->tmpDir('index','index',array('tmp'=>true));
    }
    public function id($id){
	if(!count($this->_access->getId($id,'on'))){
		session::redir(404);
	}
       $this->_access->updateVzt(array('id'=>$id)) ;
       $this->_view->assign('_rows', $this->_access->getId($id,'on'));

      $this->_view->tmpDir('id','id',array('tmp'=>true));
    }

    public function sendmsg($id){
        $this->_view->tmpDir('sendmsg','',true);
    }
    public function friend($id){

          if($this->_input->get('send')==1){

      if($this->_token->check($this->_input->get('token'))){

          $this->_validate->check($_POST,
          array(
                  'fname'=>array(
                        'required'=>true,
                         'min'=>5,
                         'max'=>50
                  ),'email'=>array(
                        'required'=>true,
                         'min'=>5,
                         'max'=>50
                  ),'title'=>array(
                        'required'=>false,
                         'min'=>5,
                         'max'=>50
                  ),'subject'=>array(
                        'required'=>false,
                         'min'=>5,
                         'max'=>50
                  ),'captcha'=>array(
                        'required'=>true,
                        'min'=>3,
                        'max'=>5,
                        'captcha'=>true
                   )
                  )
          );

                if($this->_validate->passed()){
                  $fname=$this->_input->get('fname');
                  $femail=$this->_input->get('femail');
                  $name=$this->_input->get('name');
                  $email=$this->_input->get('email');
                  $title=$this->_input->get('title');
                  $subject=$this->_input->get('subject');

                     $msg="
                      اهلا بك يا $fname<br>
                      لقد ارسل لك $name
                      رابط اعلان من موقع ".system::_data("url_site")." على الرابط التالى    <br>
                      <a href='".system::_data("url_site")."cars/index/id/".$id."'>الرابط التالى</a>
                    ";
                    $valueemail=array(
                        'name'=>$name,
                        'email'=>$email,
                        'femail'=>$femail,
                        'title'=>'رسالة من صديق '.$name,
                        'msg'=>$msg
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


        $this->_view->assign('_id',(int)$id);
      $this->_view->tmpDir('friend','',true);
    }
  }

?>