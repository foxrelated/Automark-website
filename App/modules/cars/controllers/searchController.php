<?php
  class searchController extends controller{

    private $_cars;
    private $_typecar;
    private $_city;
    private $_option;
    private $_shows;
    private $_iduser;
    private $_chat1;
    function __construct(){
       parent::__construct();

         $this->_cars=$this->loadModel("cars",'admin');
        $this->_typecar=$this->loadModel("typecar",'admin');
        $this->_city=$this->loadModel("city",'admin');
        $this->_shows=$this->loadModel("shows",'admin');
        $this->_option=$this->loadModel("option",'admin');
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
   public function index($er=null){
        if($this->_input->get('search')==1){
               session::put("search",$_POST);
            }
            //
            $getSearch=session::get("search");
            //var_dump($getSearch);die;
               $arraySearch=array(
                "title"=>isset($getSearch['title'])?$getSearch['title']:'',
                "model"=>isset($getSearch['model'])?$getSearch['model']:'',
                "submodel"=>isset($getSearch['submodel'])?$getSearch['submodel']:'',
                "type"=>isset($getSearch['type'])?$getSearch['type']:'',
                "pricemin"=>isset($getSearch['pricemin'])?$getSearch['pricemin']:'',
                "pricemax"=>isset($getSearch['pricemax'])?$getSearch['pricemax']:'',
                "country"=>isset($getSearch['country'])?$getSearch['country']:'' ,
                "years"=>isset($getSearch['years'])?$getSearch['years']:'' ,
                "city"=>isset($getSearch['city'])?$getSearch['city']:''
                ); 
            
            
                    $data= $this->_cars->search($arraySearch);
                    //var_dump($data);die;
                    $this->_view->assign("search",$data);
                    if($er=="non"){
                     $this->_view->assign("_msg",_t("السيارة غير متوفرة بالموقع"));
                    }
                    $this->_view->tmpDir('search','',array('tmp'=>true));

    }

    public function general($er=null){
        if($this->_input->get('generalsearch')==1){
               session::put("generalsearch",$_POST);
            }
            
            $getSearch=session::get("generalsearch");
            if(!is_numeric($getSearch['pricemin']))
            {
                //session::redir();
                header(system::_data("url_site")); /* Redirect browser */
                
            }
            if(!is_numeric($getSearch['pricemax']))
            {
                header(system::_data("url_site")); /* Redirect browser */
                
            }
            if(!is_numeric($getSearch['desemin']))
            {
                header(system::_data("url_site")); /* Redirect browser */
                
            }
            if(!is_numeric($getSearch['desemax'])){
                header(system::_data("url_site")); /* Redirect browser */
                
            }
                
            //var_dump($getSearch);die;
               $arraySearch=array(
                "category"=>isset($getSearch['category'])?$getSearch['category']:'',
                "model"=>isset($getSearch['model'])?$getSearch['model']:'',
                "pricemin"=>isset($getSearch['pricemin'])?$getSearch['pricemin']:'',
                "pricemax"=>isset($getSearch['pricemax'])?$getSearch['pricemax']:'',
                "country"=>isset($getSearch['country'])?$getSearch['country']:'' ,
                "yearsemin"=>isset($getSearch['yearsemin'])?$getSearch['yearsemin']:'' ,
                "yearsemax"=>isset($getSearch['yearsemax'])?$getSearch['yearsemax']:'' ,
                "desemin"=>isset($getSearch['desemin'])?$getSearch['desemin']:'' ,
                "desemax"=>isset($getSearch['desemax'])?$getSearch['desemax']:'' ,
                "status"=>isset($getSearch['status'])?$getSearch['status']:'' ,
                "city"=>isset($getSearch['city'])?$getSearch['city']:''
                ); 
            
            
                    $data= $this->_cars->generalsearch($arraySearch);
                    //var_dump($data);die;
                    $this->_view->assign("search",$data);
                    if($er=="non"){
                     $this->_view->assign("_msg",_t("الذي تبحث عنه غير متوفرة بالموقع"));
                    }
                    $this->_view->tmpDir('search','',array('tmp'=>true));

    }

    public function specific($er=null){
        if($this->_input->get('specific')==1){
               session::put("specific",$_POST);
            }
            //var_dump($_GET);//die;
            $getSearch=session::get("specific");
            $arraySearch=array(
                "q"=>isset($_GET['q'])?$_GET['q']:'',
                 );
                    $data= $this->_cars->specificsearch($arraySearch);
                    //var_dump($arraySearch);die;
                    $this->_view->assign("search",$data);
                    if($er=="non"){
                     $this->_view->assign("_msg",_t("السيارة غير متوفرة بالموقع"));
                    }
                    $this->_view->tmpDir('search','',array('tmp'=>true));

    }
 public function id(){
        $id=(int)$this->_input->get('id');
        
        if($this->_cars->getId($id,'on')== true and $id!=''){
            session::redir("cars/index/id/".$id);
        }else{
          session::redir("cars/search/index/non");
        }


 }

}
?>