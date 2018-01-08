<?php
  class indexController extends controller{
    private $_news;
  
    private $_idUser;


    public $_user;
    public $_validate;
    public $_seurty;
    public $_cars;
    public $_city;
    public $_option;
    public $_access;
    public $_chat;
    private $_chat1;

    public function __construct(){
        parent::__construct();
		   $this->_cars=$this->loadModel('cars','admin');
           $this->_users=$this->loadModel("users",'users');
           $this->_chat=$this->loadModel('chat');
           $this->_chat1=$this->loadModel('newchat','chat');
$this->_user1=$this->loadModel('users','users');
   $id_user=session::get(system::get("session/session_name"));
   $user = $this->_user1->findName($id_user,"username");
   $this->_view->assign('_fromuser',$user);
   $this->_view->assign('_chat', $this->_chat1->getAll(array('from'=>$user,'listGroup'=>1)));
           $this->_idUser=$this->_users->resulte();

           
           $this->_view->assign('_cars', $this->_cars);
           $this->_view->assign('_users', $this->_users);
    }
    public function index(){
             $this->_view->assign('_title', "ادارة الرسائل");

             $this->_view->assign('_codePage', "index");
             $countPag=16;
             $count=count($this->_chat->getAll());
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
            $this->_view->assign('_chat', $this->_chat->getAll(array('listGroup'=>1)));
            $this->_view->sider('sider');
            $this->_view->tmpDir('_list','',array('tmp'=>true)); 
    }
public  function _c($id='',$user=''){
    
    if($id=='new'){
            $id=$id;
            $data_chat=array();
    }else{
        $id=(int)$id;
         $data_chat=$this->_chat->getAll(array('sub'=>$id,'listGroup'=>1));
    
        if(count($data_chat)==0){
                return false;
        }
    }
   

            $user=(int)$user;
            $this->_view->assign('_title', "بدء الدردشة");
            $data_id= $this->_cars->getId($id);
            $this->_view->assign('_chat', $this->_chat->getAll(array('listGroup'=>1)));
            $this->_view->assign('chat_acript',true);
            $this->_view->assign('_idchat',  $id);
            $this->_view->assign('_iduser',  $user);
            $this->_view->assign('rowscars',  $data_id);
            $this->_view->assign('show_meta_chat',$data_chat);
            $this->_view->tmpDir('_id','',array('tmp'=>true));   
    
    
}
   

      
public function action(){
    
    if(get_magic_quotes_gpc()){
	// If magic quotes is enabled, strip the extra slashes
        array_walk_recursive($_GET,create_function('&$v,$k','$v = stripslashes($v);'));
	   array_walk_recursive($_POST,create_function('&$v,$k','$v = stripslashes($v);'));
    }
    try{
	
	// Connecting to the database
	
	$response = array();
	
	// Handling the supported actions:
	
	switch($this->_input->get('action')){
		
		case 'login':
			$response = $this->_chat->starchat(
                    array(
                        'sender'=>$this->_input->get('sender'),
                        'user'=>$this->_input->get('user'),
                        'send'=>$this->_idUser['id_u'],
                        'chatText'=>$this->_input->get('chatText'),
                        'mazad_id'=>0,
                        'time'=>time(),
                        'type'=>'chat',
                        'status'=>1,
                        'sub'=>'0'
                        )
                );
		break;
		
		case 'checkLogged':
            
            $response=array();
            if($this->_idUser['id_u']){
            $response['logged'] = true;
			$response['loggedAs'] = array(
				'name'		=> $this->_idUser['name_u'],
				'gravatar'	=> system::_data("url_site").'Public/uploads/'.$this->_idUser['image_u']
			);
            }else{
                $response['logged'] = false;
            }
			$response = $response;
		break;
		
		case 'logout':
			//$response = Chat::logout();
		break;
		
		case 'submitChat':
			$response =  $this->_chat->starchat(
                    array(
                        'sender'=>$this->_input->get('sender'),
                        'user'=>$this->_input->get('user'),
                        'sub'=>$this->_input->get('sub'),
                        'send'=>$this->_idUser['id_u'],
                        'type'=>1,
                        'mazad_id'=>0,
                        'chatText'=>$this->_input->get('chatText')
                        )
                );;
		break;
		
		case 'getUsers':
			$response =array(
			'users' => array(
                        array(
                            'name'=>$this->_users->findName($this->_input->get('sender'),'name_u'),
                            'gravatar'	=> system::_data("url_site").'Public/uploads/'.$this->_users->findName($this->_input->get('sender'),'image_u')                            
                            ),
                        array(
                            'name'=>$this->_users->findName($this->_input->get('user'),'name_u'),
                            'gravatar'	=> system::_data("url_site").'Public/uploads/'.$this->_users->findName($this->_input->get('user'),'image_u') 
                        )
                    ),
			'total' => 2
		);
		break;
		
		case 'getChats':
            
                $arr=array();
                $arr['lastID']=$this->_input->get('lastID');
                    
                
            if($this->_input->get('sub')=='new'){
                $arr['sender']=$this->_input->get('sender');
                $arr['user']=$this->_input->get('user');
            }else{
                $arr['sub']=$this->_input->get('sub');
            }
            if($arr['sub']!=''){
                    $edit_status=array('status'=>2,'sub'=>$arr['sub'],'send'=>$this->_idUser['id_u']);
			        $status = $this->_chat->editStatusChte($edit_status);
                }
			$response = $this->_chat->getChats($arr);
		break;
		
		default:
			throw new Exception('Wrong action');
	}
	
	echo json_encode($response);
}
catch(Exception $e){
	die(json_encode(array('error' => $e->getMessage())));
}
    
    
}
      
      


  }

?>