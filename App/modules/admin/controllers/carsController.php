<?php
  class carsController extends controller{
    private $_cars;
    private $_typecar;
    private $_city;
    private $_option;
    private $_users;



    public function __construct(){
        parent::__construct();
        $this->_cars=$this->loadModel("cars");
        $this->_typecar=$this->loadModel("typecar");
        $this->_city=$this->loadModel("city");
        $this->_shows=$this->loadModel("shows");
        $this->_option=$this->loadModel("option");
        $this->_category=$this->loadModel("category",'cars');

        $this->_users=$this->loadModel("users",'users');

        $this->_view->assign('_category',$this->_category);
        $this->_view->assign('_cars',$this->_cars);
        $this->_view->assign('_typecar',$this->_typecar);
        $this->_view->assign('_city',$this->_city);
        $this->_view->assign('_option',$this->_option);
        $this->_view->assign('_shows',$this->_shows);


        $this->_view->setStyle('admin');
         $this->_view->assign('_page','ادارة السيارات');
    }
    public function index($id='',$status=''){

$this->_view->assign('_id',$id);
$this->_view->assign('_status',$status);
        if($this->_input->get('edit')==1){

            // if($this->_token->check($this->_input->get('token'))){
                       if($this->_input->get('type')=='act'){
                           $x=0;
                           foreach($this->_input->get('status') as $rowsq){
                                  $vact=array("id"=>$rowsq,'act'=>1);

                                 if($this->_cars->active($vact)){}
                          if(count($this->_input->get('status'))==$x){
                             $this->_view->assign('_msg',"تم التحديث بنجاح");
                          }


             }
             }
         }
        $this->_view->tmpDir("index");
    }
	public function edit($id){ 
	$id=($id);
	$this->_view->assign('_sub','تعديل  سيارة ');
		$data_id=$this->_cars->getId($id);
		$date_category=$this->_option->list_category(array('category'=>((int)$data_id['category_c'])));
			

  if($this->_input->get('edit')==1){

      if($this->_token->check($this->_input->get('token'))){
		  
		                $sqlArrayq=array();
						$validate=array();
                            
	$sql_def=array('imagemsh','model','modelcar','country','city','type','des','price');
	foreach($date_category as $rows_values){
		foreach ($this->_option->getOption(array('id'=>$rows_values['option_id'])) AS $rows_option_validate){
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
                            'features'=>$this->_input->get('features_c'),
                            'shows'=>$this->_input->get('shows'),
                            'images_c'=>$this->_func->enJsonArray($this->_input->get('images_c')),
                            'type'=>$this->_input->get('type'),
                            'description_c'=>$this->_input->get('description_c'),
                            'act'=>$this->_input->get('act_c'),
                            'id'=>$id
                        );
				print_r($sqlArray);
                    if($this->_cars->update($sqlArray)){
							if($this->_cars->remove_cars_meta($id)){
                         foreach($sqlArrayq AS $k_sqlArrayq=>$v_sqlArrayq){
							$array_meta_cars=array("id"=>$id,"code"=>$k_sqlArrayq,"value"=>$v_sqlArrayq);
									$this->_cars->add_meta_cars($array_meta_cars);
                         } 
						 
						 $this->_view->assign('_msg',"تم الاضافة بنجاح");
					}
                       
                     }

                    }else{
						
                      $this->_view->assign('get',array_filter($_POST));
                      $this->_view->assign('error',$this->_validate->errors());
                }
				
		  
	  }
  }
     
		   if(!count($this->_cars->getId($id))){
			session::redir(404);
		   }
		$this->_view->assign("carRows",$this->_cars->getId($id));
		$this->_view->assign('data_category',$date_category);
		$this->_view->assign('show_meta_cars',$this->_cars->get_cars_meta($data_id['id_c']));
		$this->_view->tmpDir("edit");
	
}
    public function add($id){
      $this->_view->assign('_sub','اضافة سيارة جديده');
	  $this->_view->assign('_id',$id);
      $date_category=$this->_option->list_category(array('category'=>((int)$id)));

       if($this->_input->get('add')==1){

      if($this->_token->check($this->_input->get('token')) or !$this->_token->check($this->_input->get('token'))){

         
                            $sqlArrayq=array();
							$validate=array();
                            
	$sql_def=array('imagemsh','model','modelcar','country','city','type','des','price');
	foreach($date_category as $rows_values){
		foreach ($this->_option->getOption(array('id'=>$rows_values['option_id'])) AS $rows_option_validate){
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
                            'catagory'=>$id,
                            'years'=>$this->_input->get('years'),
                            'price_c'=>$this->_input->get('price_c'),
                            'country'=>$this->_input->get('Country_c'),
                            'city'=>$this->_input->get('city'),
                            'features'=>$this->_input->get('features_c'),
                            'shows'=>$this->_input->get('shows'),
                            'images_c'=>$this->_func->enJsonArray($this->_input->get('images_c')),
                            'type'=>$this->_input->get('type'),
                            'description_c'=>$this->_input->get('description_c'),
                            'dateadd'=>date("Y-m-d"),
                            'iduser'=>session::get(system::get("session/session_name")),
                            'act'=>$this->_input->get('act_c')
                        );
						
                    if($id_last_cars=$this->_cars->insert($sqlArray)){
					
                         foreach($sqlArrayq AS $k_sqlArrayq=>$v_sqlArrayq){
							$array_meta_cars=array("id"=>$id_last_cars,"code"=>$k_sqlArrayq,"value"=>$v_sqlArrayq);
									$this->_cars->add_meta_cars($array_meta_cars);
                         }

                        $this->_view->assign('_msg',"تم الاضافة بنجاح");
                     }

                    }else{
					
                      $this->_view->assign('get',array_filter($_POST));
                      $this->_view->assign('error',$this->_validate->errors());
                }
            }
           }
print_r($_POST);

     $this->_view->assign('data_category',$date_category);
    // $this->_view->assign('data_category_value',$this->_func->jsonArray($date_category['value_ss']));
     $this->_view->tmpDir("add");
    }

    public function remove($id,$cat=null){
          if($this->_cars->remove($id)){

                session::redir('admin/cars/'.$cat);
          }
    }

  }

?>