<?php
  class indexController extends controller{


    public $_user;
    public $_validate;
    public $_seurty;
    public $_cars;
    public $_city;
    public $_option;
    public $_access;
    private $_chat1;
  public function __construct(){
    parent::__construct();
   $this->_shows=$this->loadModel("shows",'admin');
   $this->_typecar=$this->loadModel("typecar",'admin');
   $this->_cars=$this->loadModel('cars','admin');
   $this->_city=$this->loadModel('city','admin');
   $this->_option=$this->loadModel('option','admin');
   $this->_user=$this->loadModel('users','users');
   $this->_access=$this->loadModel('access','access');
   $this->_chat1=$this->loadModel('newchat','chat');
   $this->_user=$this->_user->resulte();
   $this->_shows = $this->_shows->getAll();
   $this->_user1=$this->loadModel('users','users');
   $id_user=session::get(system::get("session/session_name"));
   $user = $this->_user1->findName($id_user,"username");   
   $this->_view->assign('_fromuser',$user);
   $this->_view->assign('_chat', $this->_chat1->getAll(array('from'=>$user,'listGroup'=>1)));
   $this->_view->assign('_access',$this->_access);
   $this->_view->assign('_shows',$this->_shows);
   $this->_view->assign('_option',$this->_option);
   $this->_view->assign('_typecar',$this->_typecar);
   $this->_view->assign('_cars', $this->_cars);
   $this->_view->assign('_city', $this->_city);
   $this->_view->assign('_adsfooter', $this->_func->jsonFeild($this->_option->getCode('adsimg','option_o'),'dir','footer'));
   $this->_view->assign('_adsvedio', $this->_func->jsonFeild($this->_option->getCode('adsimg','option_o'),'dir','vedio'));
   $this->_view->assign('_adssearch', $this->_func->jsonFeild($this->_option->getCode('adsimg','option_o'),'dir','search'));
   
	$this->_cars->updateMazadCarsOfDate(array('end_date'=>time(),'status'=>3));
   
  }
    public function index($num=''){
		
     $this->_view->assign('_codePage', 'index/index');
             $countPag=16;
             $count=count($this->_cars->getlimit('last','','desc','','on'));
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
          $this->_view->assign('_carsId', $this->_cars->getlimit('last',$limit,'desc','','on'));
          $this->_view->assign('_cardSort','adv');
          //var_dump("expression");die;
		  
      $this->_view->sider('sider');
      $this->_view->tmpDir('index','index',array('tmp'=>true));
    }
  }

?>