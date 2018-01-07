<?php
  class ajaxController  extends controller {

    private $_model;
    private $_typecar;
    private $_city;
    private $_option;
    private $_shows;


    public function __construct(){
        parent::__construct();
        $this->_model=$this->loadModel("cars",'admin');
        $this->_typecar=$this->loadModel("typecar",'admin');
        $this->_city=$this->loadModel("city",'admin');
        $this->_shows=$this->loadModel("shows",'admin');
        $this->_option=$this->loadModel("option",'admin');
$this->_shows = $this->_shows->getAll();
$this->_chat=$this->loadModel('newchat','chat');
$this->_user1=$this->loadModel('users','users');
   $id_user=session::get(system::get("session/session_name"));
   $user = $this->_user1->findName($id_user,"username");
   $this->_view->assign('_fromuser',$user);
   $this->_view->assign('_chat', $this->_chat->getAll(array('from'=>$user,'listGroup'=>1)));
        $sqlspecial=$this->_option->getCode('special','option_o');
        $jsonspecial=json_decode($sqlspecial);

    }

    public function index(){

    }
  public function cardAdv(){
		//print_r(json_decode(urldecode($this->_input->get('statuses'))));
			echo "<div data-type='jplist-dataitem' data-count='100' class='box'>";
		
				foreach($this->_model->getlimit('last',10,'desc','','on') as $rowscars){ ?>
                    <div class='list-item box'>
                
                               <!-- بداية الاعلان -->
								
									<div class="img col-sm-3">
										   <a href="cars/index/id/<?php echo $rowscars['id_c'];?>"><img src="http://localhost/automark/Public/uploads/<?php echo $this->_func->jsonId($rowscars['images_c'],0); ?>"  style="height:120px; width:100%;"  alt=""></a>
									</div>
									<div class="img col-sm-9">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="daltysdown">
                                                    <div class="row">
                                                    <div class="col-sm-9">
                                                        <div class="daltysin">
                                                            <h2>
<i class="fa fa-line-chart" aria-hidden="true"></i>
                                                            <?php echo $rowscars['title_c'];?>
                                                          </h2>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <div class="numberads">
                                                                <?php echo $rowscars['id_c'];?>#
                                                            </div>
                                                    </div>
                                                </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="row">
                                            <div class="col-sm-12">
                                        <div class="daltys">
                                            
                                             <div class=" col-sm-4 col-xs-6 paddingdivcol">	
                                                 <div class="list-t ">
                                                     <div class="cartslisttitle"> <?php echo _t("السعر الحالي");?></div>
                                                     
                                                     <div class="cartslistdet"> <a href="#">
                                                         <i class="fa fa-sort-amount-desc" aria-hidden="true"></i>
                                                      <?php   $price=$this->_model->getMaxmazad(array('cars_id'=>$rowscars['id_c'] )); echo ($price['price_mazad']!='')?$price['price_mazad']: $rowscars['price_c'];?> <?php echo language::getLang(system::_data("default_currency"));?></a></div>
                                                     </div>
                                                 </div>
                                            <div class=" col-sm-4 col-xs-6 paddingdivcol">
                                                <div class="list-t ">
                                                    <div class="cartslisttitle"><?php echo _t("المدينة");?></div>
                                                    
                                                    <div class="cartslistdet"> <a href="#">
                                                        <i class="fa fa-map-marker " aria-hidden="true"></i>
                                                       <?php echo  language::getLang($this->_city->getNameId($rowscars['city_c']));?></a></div>
                                                </div>
                                                </div>

                                            <div class="col-sm-4 col-xs-12 paddingdivcol">
                                                <div class="list-t ">
                                                    <div class="cartslisttitle">
													<?php   echo ($rowscars['status_c']==3)?_t("انتهاء فترة الاعلان"):_t("وقت انتهاء المزايدة");?>
													
													</div>
                                                    <div class="cartslistdet"> <a href="#">
                                                        <i class="fa fa-calendar" aria-hidden="true"></i>
                                                        <?php  echo $this->_lang->timeago($rowscars['end_c']); ?></a></div>
                                                </div>
                                            </div> 

                                          <div class="clear"></div> 
                                        </div>
                                        </div>
                                        </div>
									</div>
                            <!-- بداية الاعلان -->
                        </div>
                       
                        
                             <?php } 
		echo "</div>";
			
    }

    public function typecar(){
      $res='';
      $id=(int)$this->_input->get('v');
      if($id!=''){
        $car= $this->_typecar->getTypeSubId($id);
        if(count($car)){
        foreach($car as $rows){
            $res.= "<option value='".$rows['id_t']."'>". language::getLang($rows['name_t'])."</option>";
        }

        }else{
          $res.= "<option value='0'>"._t("لا يوجد")."</option>";
        }
      }
    echo $res;
    }
	  public function catoption(){
      $res='';
      $id=(int)$this->_input->get('v');
      if($id!=''){
        $car= $this->_typecar->getTypeAll(array('category'=>$id));
        if(count($car)){
			 $res.= "<option value='0'>"._t("موديل رئيسى")."</option>";
        foreach($car as $rows){
            $res.= "<option value='".$rows['id_t']."'>". language::getLang($rows['name_t'])."</option>";
        }

        }else{
          $res.= "<option value='0'>"._t("موديل رئيسى")."</option>";
        }
      }
    echo $res;
    }
       public function city(){
      $res='';
      $id=$this->_input->get('v');
      if($id!=''){
        $car= $this->_city->getCityId($id);
        if(count($car)){
        foreach($car as $rows){
            $res.= "<option value='".$rows['id_c']."'>". language::getLang($rows['name_c'])."</option>";
        }

        }else{
          $res.= "<option value='0'>"._t("لا يوجد")."</option>";
        }
      }
    echo $res;
    }
    public function upload(){

    $array=array('error'=>'لم تختر الملف الصحيح');
if(isset($_FILES['images']['name'])) {

                $dirupload = ROOT.'Public/uploads/';
                $upload = new upload($_FILES['images'], 'es_Es');
                $upload->allowed = array('image/*');
                $upload->file_new_name_body = 'upl_' . uniqid();
				$upload->image_watermark       = ROOT.'App/template/hragkom/img/logoCopy.png';
				$upload->image_watermark_x     = -20;
				$upload->image_watermark_y     = -20;
                $upload->process($dirupload);
				
                 $array=array('error'=>$_FILES['images']['name']);
                if($upload->processed){
                    $imagen = $upload->file_dst_name;
                    $thumb = new upload($upload->file_dst_pathname);
                    $thumb->image_resize = true;
                    $thumb->image_x = 300;
                    $thumb->image_y = 200;
					$upload->image_watermark       = ROOT.'App/template/hragkom/img/logoCopy.png';
					$upload->image_watermark_x     = -20;
					$upload->image_watermark_y     = -20;
                    $thumb->file_name_body_pre = 'thumb_';
                    $thumb->process($dirupload . 'thumb/');

					$array['error']=1;
                    $array['name']=$imagen;
                }
                else{
					$array['error']=$upload->error;
                }
  }

 echo  json_encode($array);
    }
      
       public function getprice(){
          echo ($this->_input->get('id')*1)/100;
      }
      
  }
?>