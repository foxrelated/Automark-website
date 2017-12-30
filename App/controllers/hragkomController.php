<?php
  class hragkomController extends controller{


    public $_user;
    public $_validate;
    public $_seurty;
    public $_cars;
    public $_city;
    public $_option;
    public $_access;

  public function __construct(){
    parent::__construct();
   $this->_shows=$this->loadModel("shows",'admin');
   $this->_typecar=$this->loadModel("typecar",'admin');
   $this->_cars=$this->loadModel('cars','admin');
   $this->_city=$this->loadModel('city','admin');
   $this->_option=$this->loadModel('option','admin');
   $this->_user=$this->loadModel('users','users');
   $this->_access=$this->loadModel('access','access');
   $this->_user=$this->_user->resulte();
$this->_shows = $this->_shows->getAll();
   $this->_view->assign('_access',$this->_access);
   $this->_view->assign('_shows',$this->_shows);
   $this->_view->assign('_option',$this->_option);
   $this->_view->assign('_typecar',$this->_typecar);
   $this->_view->assign('_cars', $this->_cars);
   $this->_view->assign('_city', $this->_city);
   $this->_view->assign('_adsfooter', $this->_func->jsonFeild($this->_option->getCode('adsimg','option_o'),'dir','footer'));
   $this->_view->assign('_adsvedio', $this->_func->jsonFeild($this->_option->getCode('adsimg','option_o'),'dir','vedio'));
   $this->_view->assign('_adssearch', $this->_func->jsonFeild($this->_option->getCode('adsimg','option_o'),'dir','search'));
  
  }
    public function index(){
      //$this->_view->sider('sider');
      
      $this->_view->tmpDir('index');

    }
  }

?>