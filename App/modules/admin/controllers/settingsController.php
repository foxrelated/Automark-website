<?php
  class settingsController extends controller{
	  private $_option;
	  
    public function __construct(){
        parent::__construct();
       $this->_view->setStyle('admin');
       $this->_view->assign('_title','الاعدادات العامة');
       $this->_view->assign('_page','ادارة الموقع');
	   
	    $this->_option=$this->loadModel("settings");
	   

	   $this->_view->assign('_option', $this->_option);

    }
    public function index(){

	$array_setting=array(
						'title_site'=>'',
						'url_site'=>'',
						'email_admin'=>'',
						'key_site'=>'',
						'des_site'=>'',
						'act_site'=>'',
						'default_language'=>'',
						'default_style'=>'',
						'message_act'=>'',
						'default_controller'=>'',
						'actcomment'=>'',
						'active_comment'=>'',
						
						'facebook_footer'=>'',
						'google_footer'=>'',
						'twitter_footer'=>'',
						'youtube_footer'=>'',
						'location_footer'=>'',
						'contact_footer'=>'',
						'email_footer'=>'',
						'default_currency'=>'lang'
					);
	
       if($this->_input->get('edit')==1){

      if($this->_token->check($this->_input->get('token'))){

          $this->_validate->check($_POST,
				  array(
						  'modelcar'=>array(
								 'title_site'=>false
											)
						)
				);

                if($this->_validate->passed()){
                    
						foreach($array_setting as $rows_setting => $key){
							$loop_sett=$this->_option->getName($rows_setting);
							if($key=='lang'){
								$value_setting=language::qtrans_en($this->_input->get($rows_setting));
								
							}else{
								$value_setting=$this->_input->get($rows_setting);
							}
							
								 $sqlArray=array(
                            'name'=>$rows_setting,
                            'value'=>$value_setting,
                            'type'=>'setting'
                          
                        );
						if($loop_sett and count($loop_sett)> 0 ){
								$this->_option->edit($sqlArray);
							}else{
								$this->_option->insert($sqlArray);
							}
							
						}
                    
					 
					
                        $this->_view->assign('_msg',"تم التحديث بنجاح");
                     
                    }else{
                      $this->_view->assign('get',array_filter($_POST));
                      $this->_view->assign('error',$this->_validate->errors());
                }
            }
           }
        $this->_view->tmpDir('index');

    }
     public function edite(){


    }
  }

?>