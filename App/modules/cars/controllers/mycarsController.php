<?php
class mycarsController extends controller{
    private $_cars;
    private $_typecar;
    private $_city;
    private $_option;
    private $_shows;
    private $_iduser;
    private $_users;
    private $_chat1;

    function __construct(){
       parent::__construct();

        $this->_cars=$this->loadModel("cars",'admin');
        $this->_typecar=$this->loadModel("typecar",'admin');
        $this->_city=$this->loadModel("city",'admin');
        $this->_shows=$this->loadModel("shows",'admin');
        $this->_option=$this->loadModel("option",'admin');
        $this->_users=$this->loadModel("users",'users');
        $this->_iduser= session::get(system::get("session/session_name"));
        $this->_shows = $this->_shows->getAll();
        $this->_chat1=$this->loadModel('newchat','chat');
$this->_user1=$this->loadModel('users','users');
   $id_user=session::get(system::get("session/session_name"));
   $user = $this->_user1->findName($id_user,"username");
   $this->_view->assign('_fromuser',$user);
   $this->_view->assign('_chat', $this->_chat1->getAll(array('from'=>$user,'listGroup'=>1)));
        $this->_view->assign('_cars',$this->_cars);
        $this->_view->assign('_typecar',$this->_typecar);
        $this->_view->assign('_city',$this->_city);
        $this->_view->assign('_option',$this->_option);
        $this->_view->assign('_shows',$this->_shows);

    }
    function index($num=''){

        $countPag=20;
             $count=count($this->_cars->getlimit('users','','desc',session::get(system::get("session/session_name")),''));
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


			$this->_view->assign('_carsId', $this->_cars->getlimit('users',$limit,'desc',session::get(system::get("session/session_name"))));
			$this->_view->tmpDir('index','',array('tmp'=>true));
    }

    public function add($id=''){
		$id=(isset($id) and $id!='')?(int)$id:1;
 		$date_category=$this->_option->list_category(array('category'=>((int)$id)));

       if($this->_input->get('add')==1){

      if($this->_token->check($this->_input->get('token'))){

       
                            $sqlArrayq=array();
							$validate=array();
                            
	$sql_def=array('imagemsh','model','modelcar','country','city','type','des','price');
	foreach($date_category as $rows_values){
		foreach ($this->_option->getOption(array('id'=>$rows_values['option_id'])) AS $rows_option_validate){
			if($this->_func->jsonId($rows_option_validate['option_o'],'admin')==1){continue;}
		$force=($this->_func->jsonId($rows_option_validate['option_o'],'force')==1)?true:false;
			$validate[$rows_option_validate['code_o']]=array(
				'required'=>$force
			);
		  }
			
	   if($this->_func->jsonId($rows_option_validate['option_o'],'basic')!=1){
		  foreach ($this->_option->getOption(array('id'=>$rows_values['option_id'])) AS $rows_option){
			  if ($this->_func->jsonId($rows_option_validate['option_o'],'multiText')==1){
				  
				   $sqlArrayq[$rows_option['code_o']]=implode(' ',$this->_input->get($rows_option['code_o']));
				   continue;				  
			  }
			if(is_array($this->_input->get($rows_option['code_o'])) and count($this->_input->get($rows_option['code_o']))){
			  $sqlArrayq[$rows_option['code_o']]=$this->_func->enJsonArray($this->_input->get($rows_option['code_o']));
			}else{
			   $sqlArrayq[$rows_option['code_o']]=$this->_input->get($rows_option['code_o']);
			}
		  }
		}
    }

  $this->_validate->check($_POST,$validate);
								var_dump($_POST);
    var_dump($this->_validate->check($_POST,$validate));
    die; 
                if($this->_validate->passed()){
                          $sqlArray=array(
                            'title_c'=>$this->_input->get('title_c'),

                            'modelcar'=>$this->_input->get('type_c'),
                            'model'=>$this->_input->get('model'),
                            'catagory'=>$id,
                            'years'=>$this->_input->get('years'),
                            'price_c'=>$this->_input->get('price_c'),
                            'country'=>$this->_input->get('Country_c'),
                            'city'=>$this->_input->get('city'),
                            'features'=>1,
                            'shows'=>$this->_input->get('shows'),
                            'images_c'=>$this->_func->enJsonArray($this->_input->get('images_c')),
                            'type'=>$this->_input->get('type'),
                            'description_c'=>$this->_input->get('description_c'),
                            'dateadd'=>date("Y-m-d"),
                            'iduser'=>session::get(system::get("session/session_name")),
                            'end'=>time()+(60*60*24*30),
                            'act'=>1 
                        );
						
                    
					
					 if($id_last_cars=$this->_cars->insert($sqlArray)){
					
                         foreach($sqlArrayq AS $k_sqlArrayq=>$v_sqlArrayq){
							$array_meta_cars=array("id"=>$id_last_cars,"code"=>$k_sqlArrayq,"value"=>$v_sqlArrayq);
									$this->_cars->add_meta_cars($array_meta_cars);
                         }

                        session::redir("cars/mycars/ok");
                     }

                    }else{
                      $this->_view->assign('get',array_filter($_POST));
                      $this->_view->assign('error',$this->_validate->errors());
                }
            }
           }


        if(session::get(system::get("session/session_name"))){
				$this->_view->assign('_id',(int)$id);
			  	$this->_view->assign('data_category',$date_category);
                $this->_view->sider('sider');  
                $this->_view->tmpDir('add','',array('tmp'=>true));
       } else{
           $this->_view->tmpDir('nonuser','',array('tmp'=>true));
       }
    }

     public function addfreeads($id= ''){
      
      $id=(isset($id) and $id!='')?(int)$id:1;
      $date_category=$this->_option->list_category(array('category'=>((int)$id)));
      $iduser=session::get(system::get("session/session_name"));
      $phoneuser = $this->_user1->findphone($iduser,"mobile_u");//
      
       if($this->_input->get('add')==1){
        //var_dump($this->_token->check($_POST['token']));
      //if($this->_token->check($_POST['token'])){

      $sqlArrayq=array();
      $validate=array();
                            
  $sql_def=array('imagemsh','model','modelcar','country','city','type','des','price');
  foreach($date_category as $rows_values){
    foreach ($this->_option->getOption(array('id'=>$rows_values['option_id'])) AS $rows_option_validate){
      if($this->_func->jsonId($rows_option_validate['option_o'],'admin')==1){continue;}
    $force=($this->_func->jsonId($rows_option_validate['option_o'],'force')==1)?true:false;
      $validate[$rows_option_validate['code_o']]=array(
        'required'=>$force
      );
      }
      
     if($this->_func->jsonId($rows_option_validate['option_o'],'basic')!=1){
      foreach ($this->_option->getOption(array('id'=>$rows_values['option_id'])) AS $rows_option){
        if ($this->_func->jsonId($rows_option_validate['option_o'],'multiText')==1){
          
           $sqlArrayq[$rows_option['code_o']]=implode(' ',$this->_input->get($rows_option['code_o']));
           continue;          
        }
      if(is_array($this->_input->get($rows_option['code_o'])) and count($this->_input->get($rows_option['code_o']))){
        $sqlArrayq[$rows_option['code_o']]=$this->_func->enJsonArray($this->_input->get($rows_option['code_o']));
      }else{
         $sqlArrayq[$rows_option['code_o']]=$this->_input->get($rows_option['code_o']);
      }
      }
    }
   }
  $this->_validate->check($_POST,$validate);  
  var_dump($_POST);
  var_dump($this->_validate->check($_POST,$validate));
  var_dump($_FILES);
  die();
           
                if($this->_validate->passed()){
                          $sqlArray=array(
                            'title_c'=>$_POST['title_ad'],
                            'modelcar'=>$_POST['type_c'],
                            'model'=>$_POST['model'],
                            'catagory'=>$id,
                            'years'=>$_POST['years'],
                            'price_c'=>$_POST['price_ad'],
                            'country'=>$_POST['Country_c'],
                            'city'=>$_POST['city'],
                            'features'=>1,
                            
                            'images_c'=>$this->_func->enJsonArray($this->_input->get('images_c')),
                            'type'=>"h",//$this->_input->get('type'),
                            //'description_c'=>$_POST['additionalinformation'],
                            'dateadd'=>date("Y-m-d"),
                            'iduser'=>session::get(system::get("session/session_name")),
                            'end'=>time()+(60*60*24*30),
                            'act'=>1,
                            'vzt_c' => 1
                        );
            
                    
          var_dump($sqlArray);die;
           if($id_last_cars=$this->_cars->insert($sqlArray)){
          //var_dump($id_last_cars);die;
           foreach($sqlArrayq AS $k_sqlArrayq=>$v_sqlArrayq){
              $array_meta_cars=array("id"=>$id_last_cars,"code"=>$k_sqlArrayq,"value"=>$v_sqlArrayq);
                  $this->_cars->add_meta_cars($array_meta_cars);
                         }
                        
                        session::redir("cars/mycars/ok");
                     }

                    }else{
                      $this->_view->assign('get',array_filter($_POST));
                      $this->_view->assign('error',$this->_validate->errors());
                }
            //}
           }
           
        if(session::get(system::get("session/session_name"))){
        $this->_view->assign('_id',(int)$id);
          $this->_view->assign('data_category',$date_category);
          $this->_view->assign('phoneuser',$phoneuser);
          $this->_view->assign('id',$id);
          $this->_view->sider('sider');  
          $this->_view->tmpDir('addfreeads','',array('tmp'=>true));
       } else{
           $this->_view->tmpDir('nonuser','',array('tmp'=>true));
       }
    }
      public function edit($id){
		$id=($id);
		$data_id=$this->_cars->getId($id);
		$date_category=$this->_option->list_category(array('category'=>((int)$data_id['category_c'])));
			

       if($this->_input->get('edit')==1){

      if($this->_token->check($this->_input->get('token'))){

               $sqlArrayq=array();
						$validate=array();
                            
	$sql_def=array('imagemsh','model','modelcar','country','city','type','des','price');
	foreach($date_category as $rows_values){
		foreach ($this->_option->getOption(array('id'=>$rows_values['option_id'])) AS $rows_option_validate){
		if($this->_func->jsonId($rows_option_validate['option_o'],'admin')==1){continue;}
		$force=($this->_func->jsonId($rows_option_validate['option_o'],'force')==1)?true:false;
			$validate[$rows_option_validate['code_o']]=array(
				'required'=>$force
			);
		  }
			
	   if($this->_func->jsonId($rows_option_validate['option_o'],'basic')!=1){
		  foreach ($this->_option->getOption(array('id'=>$rows_values['option_id'])) AS $rows_option){
			  
			if(is_array($this->_input->get($rows_option['code_o'])) and count($this->_input->get($rows_option['code_o']))){
			  $sqlArrayq[$rows_option['code_o']]=$this->_func->enJsonArray($this->_input->get($rows_option['code_o']));
			}else{
			   $sqlArrayq[$rows_option['code_o']]=$this->_input->get($rows_option['code_o']);
			}
		  } 
		}
                                 }
								 
		  $this->_validate->check($_POST,$validate);

                if($this->_validate->passed()){
					
                          $sqlArray=array(
                           'title_c'=>$this->_input->get('title_c'),

                           'modelcar'=>$this->_input->get('type_c'),
                            'model'=>$this->_input->get('model'), 
                            'years'=>$this->_input->get('years'),
                            'price_c'=>$this->_input->get('price_c'),
                            'country'=>$this->_input->get('Country_c'),
                            'city'=>$this->_input->get('city'),
                            'features'=>$data_id['features_c'],
                            'shows'=>$this->_input->get('shows'),
                            'images_c'=>$this->_func->enJsonArray($this->_input->get('images_c')),
                            'type'=>$this->_input->get('type'),
                            'description_c'=>$this->_input->get('description_c'),
                            'act'=>$data_id['act_c'],
                           
                            'id'=>$data_id['id_c']
                        );
						 
                    if($this->_cars->update($sqlArray)){
							if($this->_cars->remove_cars_meta($id)){
                         foreach($sqlArrayq AS $k_sqlArrayq=>$v_sqlArrayq){
							$array_meta_cars=array("id"=>$id,"code"=>$k_sqlArrayq,"value"=>$v_sqlArrayq);
									$this->_cars->add_meta_cars($array_meta_cars);
                         } 
							
                  
                       $this->_view->assign('_msg',"تم التعديل بنجاح");
                   
							}
                    }else{
								
								$this->_view->assign('_msg',"حاول مرة اخري");
							} 
            
           }else{
					
                      $this->_view->assign('error',$this->_validate->errors());
                }
	  }
	   }

        if($this->_iduser){
                $dataUser=$this->_cars->getIdU($id,$this->_iduser);
                if($dataUser){
				$this->_view->assign('show_meta_cars',$this->_cars->get_cars_meta($dataUser['id_c']));
				  $this->_view->assign('data_category',$date_category);
                  $this->_view->assign("carRows",$dataUser);
				  $this->_view->sider('sider');
                  $this->_view->tmpDir('edit','',array('tmp'=>true));
					  
                }else{
                   session::redir("404");
                }
       } else{
           $this->_view->tmpDir('nonuser','',array('tmp'=>true));
       }
    }

    public function del($id){
      $id=(int)$id;
         $user=$this->_iduser;
        if(isset($id) and !empty($user)){
          $sqlArray=array('id'=>$id,'user'=>$user);
         if($this->_cars->del($sqlArray)){
              session::redir("cars/mycars");
         }
        } else{
                session::redir("404");
         }

    }
    public function ok(){
      $this->_view->tmpDir('ok','',array('tmp'=>true));
    }

  }
?>
