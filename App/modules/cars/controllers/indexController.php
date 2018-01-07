<?php
  class indexController extends controller{



    private $_cars;
    private $_city;
    private $_shows;
    private $_users;
    private $_option;
    private $_order;
    private $user_id;
    private $_chat;

  public function __construct(){
    parent::__construct();
       $this->user_id=session::get(system::get("session/session_name"));
       $this->_typecar=$this->loadModel("typecar",'admin');
       $this->_cars=$this->loadModel('cars','admin');
       $this->_shows=$this->loadModel('shows','admin');
       $this->_users=$this->loadModel("users",'users');
       $this->_city=$this->loadModel('city','admin');
       $this->_option=$this->loadModel('option','admin');
       $this->_order=$this->loadModel('order','cars');
       $this->_category=$this->loadModel("category",'cars');
       $this->_chat=$this->loadModel("chat",'chat');
       $this->_allshows = $this->_shows->getAll();
       $this->_chat=$this->loadModel('newchat','chat');
$this->_user1=$this->loadModel('users','users');
   $id_user=session::get(system::get("session/session_name"));
   $user = $this->_user1->findName($id_user,"username");
   
   $this->_view->assign('_chat', $this->_chat->getAll(array('from'=>$user,'listGroup'=>1)));
   $this->_view->assign('_adscars', $this->_func->jsonFeild($this->_option->getCode('adsimg','option_o'),'dir','cars'));
    $this->_view->assign('_adsvedio', $this->_func->jsonFeild($this->_option->getCode('adsimg','option_o'),'dir','vedio'));

    $this->_view->assign('_option',$this->_option);
   $this->_view->assign('_typecar',$this->_typecar);
   $this->_view->assign('_shows',$this->_allshows);
   $this->_view->assign('_cars', $this->_cars);
   $this->_view->assign('_city', $this->_city);
   $this->_view->assign('_users', $this->_users);

  }
    public function index(){
      
      $this->_view->tmpDir('index','index',array('tmp'=>true));
    }
    public function id($id){
      //var_dump($id);
		$id=(int)$id;
		$data_id=$this->_cars->getId($id,'on');
  	if(!count($data_id)){
  		session::redir(404);
  	}
		$date_category=$this->_category->getCategory(array('id'=>((int)$data_id['category_c'])));
        $this->_cars->updateVzt(array('id'=>$id)) ;
		$car_list=$this->_cars->getId($id,'on');


        if($this->user_id==$car_list['id_user']){
           $data_mazat=array('cars_id'=>$id); 
        }else{
            $data_mazat=array('cars_id'=>$id,'user_id'=>$this->user_id); 
        }
      $iscarfavorite = $this->_cars->getcarfavorite($this->user_id,$data_id['id_c']);
	    $this->_view->assign("_maxPrice",$this->_cars->getMaxmazad(array('cars_id'=>$id)));
	    $this->_view->assign("_carsId",$data_id);
      $this->_view->assign("_iscarfavorite",$iscarfavorite);
	    $this->_view->assign("_mazad",$this->_cars->selectMazadCars($data_mazat));
			$this->_view->assign('data_category',$date_category);
      $this->_view->assign('_lastcarsId', $this->_cars->getlimit('last',4,'desc','','on'));
			$this->_view->assign('show_meta_cars',$this->_cars->get_cars_meta($data_id['id_c']));
			$this->_view->assign('data_category_value',$this->_func->jsonArray($date_category['value_ss']));
			$this->_view->assign('data_comment',$this->_cars->getComment(array('car'=>$id,'order'=>'time_com','act'=>1)));
	
    if(system::_data("active_comment")==1 or (system::_data("active_comment")==2 and session::get(system::get("session/session_name")))){	
			$this->addcomment();
	}
          
		   $this->_view->sider('sider');
		   $this->_view->tmpDir('carid','id',array('tmp'=>true));
		
    }


	public function addcomment(){
		
				if($this->_input->get('add')==1){

      if($this->_token->check($this->_input->get('token'))){


$validate=  array(
                  'title'=>array(
                        'required'=>true,
                         'min'=>5,
                         'max'=>50
                  ),'subject'=>array(
                        'required'=>true,
                         'min'=>5,
                         'max'=>250
                  ),'car'=>array(
                        'required'=>true
                  ),'captcha'=>array(
                        'required'=>true,
                        'min'=>3,
                        'max'=>5,
                        'captcha'=>true
                   )
                  );
				  if(!session::get(system::get("session/session_name"))){
$validate['name']=array(
                        'required'=>true,
                         'min'=>5,
                         'max'=>50
                  );
$validate['email']=array(
                        'required'=>true,
                         'min'=>5,
                         'max'=>50
                  ); 

				  }
          $this->_validate->check($_POST,$validate);
	$name='0';
	$email='0';
	$id_user=session::get(system::get("session/session_name"));
  if(!session::get(system::get("session/session_name"))){
	  $name=$this->_input->get('name');
	  $email=$this->_input->get('email');
	  $id_user='0';
	  }
                if($this->_validate->passed()){
                 		$valueComment=array(
							'title'=>$this->_input->get('title'),
							'subject'=>$this->_input->get('subject'),
							'ip'=>$this->_input->get('ip'),
							'time'=>time(),
							'act'=>system::_data("actcomment"),
							'id_user'=>$id_user,
							'id_car'=>$this->_input->get('car'),
							'name'=> $name,
							'email'=>$email
						);
					if($this->_cars->addCommentId($valueComment)){
					
						}
				 
                  }else{
                        $this->_view->assign('get',array_filter($_POST));
                      $this->_view->assign('error',$this->_validate->errors());
                }
            }
           }
		
		}
    public function showsid($id='',$num=''){
		$this->_view->assign('_cardSort','adv');
    //var_dump($id);
			$id=(int)$id;
          	 $this->_view->assign('_codePage', "showsid");
             $countPag=10;
             $count=count($this->_cars->getlimit('shows','','desc',$id,'on'));
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
			      $_shows=$this->_shows->getId($id);

            $datacars =  $this->_cars->getlimit('shows',$limit,'desc',$id,'on');
            
            $userid = $_shows['user_id'];
          $user = $this->_users->findName($userid,"username");
          $this->_view->assign('_user',$user);
          
          $_fromuser = $this->_users->findName($this->user_id,"username");
          $this->_view->assign('_fromuser',$_fromuser);
            //var_dump($limit);
           $this->_view->assign('_name_ar',$_shows['name_ar_s']);
           $this->_view->assign('_name_en',$_shows['name_en_s']);
           $this->_view->assign('_ids',$_shows['id_s']);
           $this->_view->assign('_showsads',$_shows['ads_s']);
           $this->_view->assign('_showsimages',$_shows['images_s']);
           $this->_view->assign('_showsemail',$_shows['email_s']);
           $this->_view->assign('_phone_num1',$_shows['phone_num1']);
           $this->_view->assign('_phone_num2',$_shows['phone_num2']);           
           $this->_view->assign('_city_s',$_shows['city_s']);
           $this->_view->assign('_region_s',$_shows['region_s']);
           $this->_view->assign('_showsemail',$_shows['email_s']);
           $this->_view->assign('_carsId',$datacars);
           $this->_view->assign('_carsIdyear',$this->_cars->getlimit('shows',$limit,'desc',$id,'on'));
          $this->_view->sider('sider');
          $this->_view->tmpDir('showsid');
    }

    public function showsidfilter($id='',$num=''){
    $this->_view->assign('_cardSort','adv');
    //var_dump($id);
      $id=(int)$id;
             $this->_view->assign('_codePage', "showsid");
             $countPag=10;
             $count=count($this->_cars->getlimit('shows','','desc',$id,'on'));
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
            $_shows=$this->_shows->getId($id);

            if($this->_input->get('generalsearch')==1){
               session::put("generalsearch",$_POST);
            }
            
            $getSearch=session::get("generalsearch");
            
            if(isset($getSearch) ){
              $arraySearch=array(
                "model"=>isset($getSearch['model'])?$getSearch['model']:'',
                "year"=>isset($getSearch['year'])?$getSearch['year']:'',
                "orderyear"=>isset($getSearch['orderyear'])?$getSearch['orderyear']:''                
                );
              $datacars =  $this->_cars->showssearch($arraySearch,'shows',$limit,'desc',$id,'on');
            }
             $userid = $_shows['user_id'];
          $user = $this->_users->findName($userid,"username");
          $this->_view->assign('_user',$user);
            //var_dump($limit);
           $this->_view->assign('_name_ar',$_shows['name_ar_s']);
           $this->_view->assign('_name_en',$_shows['name_en_s']);
           $this->_view->assign('_ids',$_shows['id_s']);
           $this->_view->assign('_showsads',$_shows['ads_s']);
           $this->_view->assign('_showsimages',$_shows['images_s']);
           $this->_view->assign('_showsemail',$_shows['email_s']);
           $this->_view->assign('_phone_num1',$_shows['phone_num1']);
           $this->_view->assign('_phone_num2',$_shows['phone_num2']);
           $this->_view->assign('_city_s',$_shows['city_s']);
           $this->_view->assign('_region_s',$_shows['region_s']);
           $this->_view->assign('_showsemail',$_shows['email_s']);
           $this->_view->assign('_carsId',$datacars);
           $this->_view->assign('_carsIdyear',$this->_cars->getlimit('shows',$limit,'desc',$id,'on'));

          $this->_view->sider('sider');
          $this->_view->tmpDir('showsid');
    }
   
	   public function show($type='',$id='',$num=''){
		   $this->_view->assign('_cardSort','adv');
			$types='';
			
			if($type=='ca'){
				$_shows=$this->_option->getAll(array('id'=>(int)$id));
				$this->_view->assign('_title', $_shows[0]['code_ss']);
				$types='category';
			}else if($type=='mo'){
				$types='model';
				$_shows=$this->_typecar->getTypeSubId((int)$id);
				$this->_view->assign('_title', $_shows);
			}else if($type=='ci'){
				$types='city';
				$_shows=$this->_city->getNameId((int)$id);
				$this->_view->assign('_title', $_shows);
			}else if($type=='us'){
				$types='users';
				$_shows=$this->_users->findName((int)$id,'name_u');
				$this->_view->assign('_title', $_shows);
			}else{
				
			}
			
			$id=(int)$id;
			$section=array('type'=>$types,'id'=>$id);
             $this->_view->assign('_codePage', 'show/'.$type.'/'.$id);
             $countPag=16;
             $count=count($this->_cars->getlimit($section,'','desc',$id,'on'));
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
          $this->_view->assign('_carsId', $this->_cars->getlimit($section,$limit,'desc',$id,'on'));

          //$this->_view->sider('sider');
          $this->_view->tmpDir('showsid','',array('tmp'=>true));
    } 

	public function addtofavorites($carId=''){
    $id=(int)$carId;
    $data_id=$this->_cars->getId($id,'on');
    $id_user=session::get(system::get("session/session_name"));
    if(!count($data_id)){

      session::redir(404);
    }
    if(!count($id_user)){
      
      session::redir(404);
    }
    //var_dump(md5 ("abdalazeze11111"));
    
    $iscarfavorite = $this->_cars->getcarfavorite($id_user,$data_id['id_c']);
    if(!count($iscarfavorite)){
      $sqlArray=array(
           'user_id'=>$id_user,

           'car_id'=>$data_id['id_c']
    
    );
    if($id_last_cars=$this->_cars->insertcarfavorite($sqlArray)){
      session::redir("cars/index/id/{$data_id['id_c']}");
     }

    }
    else{
      session::redir("cars/index/id/{$data_id['id_c']}");
    }     
    
  }

	public function ShowCarType($type=''){
		  
			$types='';
          if($type=='ca'){
				$types='category';
			}else if($type=='mo'){
				$types='model';
			}else if($type=='ci'){
				$types='city';
			}else{
				
			}
			$id=explode('-',$this->_input->get('id'));
			
			if($this->_input->get('id')=='prod-cnt'){
				
				$section=array();
			}else{
			$id=(int)$id[1];
			$section=array('type'=>$types,'id'=>$id);
			}
             $countPag=16;
             $count=count($this->_cars->getlimit($section,'','desc',$id,'on'));
             $num=(isset($num) and $num!='' and  is_numeric($num))?(int)$num:1;
              $countNumPage=ceil($count/$countPag)+1;
               if($num<$countNumPage){
            	   	$limitNext=($num-1)*$countPag;
            	 }else{
            		$limitNext=0;
            	 }
			  $limit=array('limit_start'=>$limitNext,'limit_end'=>$countPag);
            $listPage=array('list'=>$num,'count'=>$countNumPage);
          $this->_view->assign('_carsId', $this->_cars->getlimit($section,$limit,'desc',$id,'on'));
          $this->_view->assign('_view', $this->_input->get('view'));
          //$this->_view->sider('sider');
          $this->_view->tmpDir('cars/index/showCarTypeAj','',array('other'=>true));
    }
    
       public function offers($id='',$num=''){
          $this->_view->assign('_title', "السيارات المميزة");
          $this->_view->assign('_codePage', "offers");

            $countPag=16;
             $count=count($this->_cars->getlimit('features','','desc',$id,'on'));
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


          $this->_view->assign('_carsId', $this->_cars->getlimit('features',$limit,'desc',$id,'on'));

          $this->_view->sider('sider');
          $this->_view->tmpDir('showsid','',array('tmp'=>true));
    }
	public function model($id=''){
	         $this->_view->assign('_codePage', "model");

             $countPag=16;
             $count=count($this->_cars->getlimit('model','','desc',$id,'on'));
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
        $this->_view->assign('_title',$this->_typecar->getNameId($id));
        $this->_view->assign('_carsId', $this->_cars->getlimit('model',$limit,'desc',$id,'on'));

        $this->_view->sider('sider');
        $this->_view->tmpDir('showsid','',array('tmp'=>true));
    }
    
    public function addmazad(){
        $_POST['user_id']=$this->user_id;
         if($this->_input->get('addmazad')==1){

      if($this->_token->check($this->_input->get('token'))){

          $this->_validate->check($_POST,
          array(
                  'price'=>array(
                        'required'=>true,
                        'int'=>true,
                  ),'cars_id'=>array(
                        'required'=>true,
                        'int'=>true,
                        'is_ok'=>'cars',
                        'name_id'=>'id_c'
              
                  ),'user_id'=>array(
                        'required'=>true,
                        'text'=>'يجب تسجيل دخول'
                  )
            )
          );

                if($this->_validate->passed()){
					$maxprice=$this->_cars->getMaxmazad(array('cars_id'=>$this->_securty->tities($this->_input->get('cars_id'))));
					if( $this->_securty->tities($this->_input->get('price')) > $maxprice['price_mazad'] and $this->_securty->tities($this->_input->get('price')) > $maxprice['price_c']){
                            $arr=array(
                            'user_id'=>$this->_securty->tities($this->_input->get('user_id')),
                            'cars_id'=>$this->_securty->tities($this->_input->get('cars_id')),
                            'price'=>$this->_securty->tities($this->_input->get('price')),
                            'comment'=>'',
                            'status'=>1,
                            'time'=>time()
                            );
                            if($this->_cars->addMazadCars($arr)){
                                echo 1;
                            }
					   }else{
						   echo 'هذا السعر ادني من السعر الموجود';
						   
					   }
                    }else{
                        echo '<ul>';
                       foreach($this->_validate->errors() as $rows){
                           echo '<li>'.$rows.'</li>';
                       }
                    echo '</ul>';
                }
            }
           }

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
                      رابط اعلان من موقع ".system::_data("title_site")." على الرابط التالى    <br>
                      <a href='".system::_data("url_site")."cars/index/id/".$id."'>الرابط هنا</a>
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
      $this->_view->tmpDir('friend','',array('none_style'=>true,'tmp'=>true));
    }
	
	public function spam_($type='',$car='',$comm=''){
		
		$car=(int)$car;
		$comm=(int)$comm;
		if($type==1){
			$type='comment';
		}else if ($type==2){
			$type='art';	
		}
		if(!$type){
			exit;
		}
		$id_user=session::get(system::get("session/session_name"));
  if(!$id_user){
	  echo '<h3>'._t("انت غير مسجل دخول")."</h3>";
	  exit;
	  }
				if($this->_input->get('add')==1){

      if($this->_token->check($this->_input->get('token'))){


$validate=  array(
                  'type_ss'=>array(
                        'required'=>true
                  ),'subject'=>array(
                        'required'=>true,
                         'min'=>5,
                         'max'=>250
                  
                  ),'captcha'=>array(
                        'required'=>true,
                        'min'=>3,
                        'max'=>5,
                        'captcha'=>true
                   )
                  );
				

				  }
          $this->_validate->check($_POST,$validate);
	
	
                if($this->_validate->passed()){
                 		$valueComment=array(
							'type_ss'=>$this->_input->get('type_ss'),
							'subject'=>$this->_input->get('subject'),
							'ip'=>'11',
							'time'=>time(),
							'id_user'=>$id_user,
							'id_car'=>$car,
							'id_comment'=>$comm,
							'type_car'=>$type
						);
					if($this->_cars->addSapmId($valueComment)){
					   $this->_view->assign('_msg',_t("تم الارسال بنجاح"));
                         }else{
                            $this->_view->assign('_msg',_t("حاول مره اخرى"));
                         }
				 
                  }else{
                        $this->_view->assign('get',array_filter($_POST));
                      $this->_view->assign('error',$this->_validate->errors());
                }
            }
           
		
			 $this->_view->tmpDir('spam','',array('none_style'=>1 , 'tmp'=>1));
		
		}
public function accept($type='',$car='',$comm=''){
    $data=array();
    $data['cars_id']=$car;
    $data['mazad_id']=($this->_input->get('mazad_id')=='')?$comm:$this->_input->get('mazad_id');
    $data['data_mazad']=$this->_cars->getMaxmazad(array('id'=> $data['mazad_id']));

    if($this->_input->get('add')=='accept'){
                $_POST['user_id']=$this->user_id;

      if($this->_token->check($this->_input->get('token'))){

$validate=  array(
                  'type_ss'=>array(
                        'required'=>true,
                        'text'=>'حقل الموافقة مطلوب'
                  ),'subject'=>array(
                        'required'=>true,
                        'text'=>'يجب ارفاق محتوي الرسالة ',
                         'min'=>5,
                         'max'=>250
                  
                  ),'cars_id'=>array(
                        'required'=>true,
                
                        'int'=>true,
                        'is_ok'=>'cars',
                        'name_id'=>'id_c'
              
                  ),'user_id'=>array(
                        'required'=>true,
                        'text'=>'يجب تسجيل دخول'
                  )
                  );
				

				  }
          $this->_validate->check($_POST,$validate);
	
	
                if($this->_validate->passed()){
                    
                    if($this->_input->get('type_ss')==1){
                        $this->_cars->updateMazad(array('id'=>$this->_input->get('mazad_id'),'status'=>2));
                        $this->_cars->updateMazadcars(array('id'=>$data['data_mazad']['cars_id'],'status'=>2));
                    }
                 		$valueComment= array(
                        'sender'=>$this->_input->get('user_id'),
                        'user'=>$data['data_mazad']['user_id'],
                        'send'=>$this->_input->get('user_id'),
                        'chatText'=>$this->_input->get('subject'),
                        'time'=>time(),
                        'type'=>$this->_input->get('type_ss'),
                        'status'=>1,
                        'sub'=>0,
                        'mazad_id'=>$this->_input->get('mazad_id')
                        );
					if($this->_chat->starchat($valueComment)){
                            echo 1;
                         }else{
                                echo 'حاول مرة اخري';
                            }
				 
                  }else{
                        echo '<ul>';
                       foreach($this->_validate->errors() as $rows){
                           echo '<li>'.$rows.'</li>';
                       }
                    echo '</ul>';     
                }
           
        return false;
    }
        $car=(int)$car;
		$comm=(int)$comm;
		if($type==1){
			$type='accept';
		}else if ($type==2){
			$type='messages';	
		}
		if(!$type){
			exit;
		}
    $id_user=session::get(system::get("session/session_name"));
    
    if(!$id_user){
        echo '<h3>'._t("انت غير مسجل دخول")."</h3>";
        exit;
	  }
	     $this->_view->assign('data',$data);

		 $this->_view->tmpDir('cars/index/accept','',array('other'=>true));
		
}
      public function ok(){
      $this->_view->tmpDir('ok','',array('tmp'=>true));
    }


  }

?>