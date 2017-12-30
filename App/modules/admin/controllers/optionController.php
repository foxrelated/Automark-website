<?php
  class optionController extends controller{

  private $_option;
    public function __construct(){
        parent::__construct();
       $this->_view->setStyle('admin');
       $this->_view->assign('_title','الخيارات الاضافية');
       $this->_view->assign('_page','الخيارات الاضافية');

       $this->_option=$this->loadModel("option");
	   	$this->_view->assign('_option',$this->_option);
    }
    public function index(){

        $this->_view->tmpDir('index');

    }
public function edit($id){
	$id=(int)$id;
	

	
	
            if($this->_input->get('edit')==1){

      if($this->_token->check($this->_input->get('token'))){

          $this->_validate->check($_POST,
          array(
                  'name'=>array(
                         'required'=>false
                  )
               )
          );

                if($this->_validate->passed()){
                        $sqlArray=array(
                            'name'=>language::qtrans_en($this->_input->get('name')),
                            'id'=>$id
                        );


                     if($this->_option->updateOption($sqlArray)){ 
					  $x=1;
					  if($this->_input->get('option')!='' and count($this->_input->get('option'))>0){
						   foreach(array_filter($this->_input->get('option')) AS  $keyOption=>$rows_option){
								if($option_tr=language::qtrans_en($rows_option)){
									$value_type=$this->_input->get('value');
									$value_option=array(
										'id'=>$keyOption,
										'value_op'=>$option_tr,
										'type_op'=>$value_type[$keyOption]
									);
									print_r($value_option);
									$this->_option->updateValueOption($value_option);
								 }
							 $x++;  
						  }
					  }
					    if($this->_input->get('option_new')!='' and count($this->_input->get('option_new'))>0){
						   foreach(array_filter($this->_input->get('option_new')) AS  $rows_option_new){
								if($option_tr_new=language::qtrans_en($rows_option_new)){
									$value_type_new=$this->_input->get('value_new');
									$value_option_new=array(
										'id_op'=>$id,
										'value_op'=>$option_tr_new,
										'type_op'=>$value_type_new[$x]
									);
									$this->_option->addValueOption($value_option_new);
								 }
							 $x++;  
						  }
					  }
                        $this->_view->assign('_msg',"تم الاضافة بنجاح");
                     }

                    }else{
                      $this->_view->assign('get',array_filter($_POST));
                      $this->_view->assign('error',$this->_validate->errors());
                }
            }
           }
	
	
	
	
	
	$option_data=$this->_option->getOption(array('id'=>$id));
	$oprionValue=$this->_option->geValueOption($option_data[0]['id_o']);
	
	
	$this->_view->assign("option_data",$option_data[0]);	
	$this->_view->assign("option_value_data",$oprionValue);
	$this->_view->tmpDir('edit');
	
		 ?>
            <script>
            $(document).ready(function(){
               $("#addspecial").click(function(){
                 var num=$("#numrows").val();
			    $("#numrows").val(parseInt(num)+1);
                    <?php

                         $xnum=1;
                         $ww="";
                         foreach(system::get('language_array') as $langk=>$langv){
                            $ww.= "<div class='control-group'> <div class='span4'>".system::get('language_array'.'/'.$langk.'/name')."<div class='controls' > <input type='text'   name='option_new[\"+num+\"][".$langk."]' value=''  /> </div> </div> </div>";
                           }
                            $ww.="<div class='control-group'><div class='span4'>"._t("قيمة افتراضية")." <div class='controls' > <input type='text'   name='valuen_new[\"+num+\"]' value=''  /></div></div></div> <input type='hidden' name='option_add[\"+num+\"]' value='new' />";
                     ?>
                  $("#specialcode").append("<?php echo  $ww;?>");
               });

            });
            </script>
       <?php
	   
	
	}
    public function get($id=null){
            if($this->_input->get('add')==1){

      if($this->_token->check($this->_input->get('token'))){

          $this->_validate->check($_POST,
          array(
                  'name'=>array(
                         'required'=>true
                  )
                  )
          );

                if($this->_validate->passed()){
                        $sqlArray=array(
                            'option'=>$this->_func->enJsonArray($this->_input->get('name')) ,
                            'id'=>$id
                        );
                     if($this->_option->updateOption($sqlArray)){
                        $this->_view->assign('_msg',"تم الاضافة بنجاح");
                     }
                    }else{
                      $this->_view->assign('get',array_filter($_POST));
                      $this->_view->assign('error',$this->_validate->errors());
                }
            }
           }
             if(isset($id)){


              $this->_view->assign('_id',$id);


              $this->_view->tmpDir('get');
            }
       ?>
            <script>
            $(document).ready(function(){
               $("#addspecial").click(function(){
                  $("#specialcode").append("  <div class='span4'> <input type='tex' name='name[]' value=''  /></div>");
               });

            });
            </script>
       <?php
    }

      public function vedioindex(){
            if($this->_input->get('add')==1){

      if($this->_token->check($this->_input->get('token'))){

          $this->_validate->check($_POST,
          array(
                  'name'=>array(
                         'required'=>true
                  )
                  )
          );

                if($this->_validate->passed()){
                        $sqlArray=array(
                            'option'=>$this->_func->enJsonArray($this->_input->get('name')) ,
                            'id'=>'vedioindex'
                        );
                     if($this->_option->updateOption($sqlArray)){
                        $this->_view->assign('_msg',"تم الاضافة بنجاح");
                     }
                    }else{
                      $this->_view->assign('get',array_filter($_POST));
                      $this->_view->assign('error',$this->_validate->errors());
                }
            }
           }



              $this->_view->assign('_id','vedioindex');


              $this->_view->tmpDir('vedioindex');

    }
   public function adsimg(){
            if($this->_input->get('add')==1){

      if($this->_token->check($this->_input->get('token'))){

          $this->_validate->check($_POST,
          array(
                  'ads'=>array(
                         'required'=>true
                  )
                  )
          );

                if($this->_validate->passed()){
                        $sqlArray=array(
                            'option'=>$this->_func->enJsonArray($this->_input->get('ads')) ,
                            'id'=>'adsimg'
                        );
                     if($this->_option->updateOption($sqlArray)){
                        $this->_view->assign('_msg',"تم الاضافة بنجاح");
                     }
                    }else{
                      $this->_view->assign('get',array_filter($_POST));
                      $this->_view->assign('error',$this->_validate->errors());
                }
            }
           }




              $this->_view->assign('_adsimg',$this->_func->jsonArray($this->_option->getCode('adsimg','option_o')));

              $this->_view->tmpDir('adsimg');

    }
	public function offers(){
			 if($this->_input->get('add')==1){

      if($this->_token->check($this->_input->get('token'))){

          $this->_validate->check($_POST,
          array(
                  'name'=>array(
                         'required'=>true
                  )
                  )
          );

                if($this->_validate->passed()){
                        $sqlArray=array(
                            'option'=>$this->_func->enJsonArray($this->_input->get('name')) ,
                            'id'=>'offers'
                        );
                     if($this->_option->updateOption($sqlArray)){
                        $this->_view->assign('_msg',"تم الاضافة بنجاح");
                     }
                    }else{

                      $this->_view->assign('get',array_filter($_POST));
                      $this->_view->assign('error',$this->_validate->errors());
                }
            }
           }

			$this->_view->tmpDir("offers");
	   ?>
            <script>
			function removeads(t){
			var c=confirm("هل ترغب فى الحذف");
			if(c==true){
				$("."+t).remove();
				}
				return false;
			}
            $(document).ready(function(){
               $("#addspecial").click(function(){
			   var num=$("#numrows").val();
			    $("#numrows").val(parseInt(num)+1);
                   $("#specialcode").append('<div class="adsw'+num+'"><div class="span5"><label>اسم الاعلان</label><input type="text" name="name['+num+'][name]" value=""  /></div><div class="span5"><label>رابط الصورة</label> <input type="text" name="name['+num+'][img]" value=""  /></div><div class="span5"><label>مسار الصورة</label><input type="text" name="name['+num+'][url]" value=""  /></div><div class="span5"><label>حجم الاعلان</label><select name="name['+num+'][size]"><option  value="big">900*320</option><option  value="mediam1">450*350 - 1</option><option  value="mediam2">450*350 - 2</option><option  value="mediam3">450*350 - 3</option><option  value="mediam4">450*350 - 4</option></select></div><br clear="all" /><a onclick="return removeads(\'adsw'+num+'\');" href="#">حذف الاعلان</a><hr /></div>');
			   });
            });
            </script>
       <?php
	}



	public function sliderserch(){
			 if($this->_input->get('add')==1){

      if($this->_token->check($this->_input->get('token'))){

          $this->_validate->check($_POST,
          array(
                  'name'=>array(
                         'required'=>false
                  )
                  )
          );

                if($this->_validate->passed()){
                        $sqlArray=array(
                            'name'=>$this->_func->enJsonArray($this->_input->get('name')) ,
                            'code'=>'slider_search'
                        );
                     if($this->_option->updateOption_code($sqlArray)){
                        $this->_view->assign('_msg',"تم الاضافة بنجاح");
                     }
                    }else{

                      $this->_view->assign('get',array_filter($_POST));
                      $this->_view->assign('error',$this->_validate->errors());
                }
            }
           }

			$this->_view->tmpDir("sliderserch");
	   ?>
            <script>
			function removeads(t){
			var c=confirm("هل ترغب فى الحذف");
			if(c==true){
				$("."+t).remove();
				}
				return false;
			}
            $(document).ready(function(){
               $("#addspecial").click(function(){
			   var num=$("#numrows").val();
			    $("#numrows").val(parseInt(num)+1);


                  $("#specialcode").append('<div class="adsw'+num+'"><div class="span5"><label>اسم الاعلان</label><input type="text" name="name['+num+'][name]" value=""  /></div><div class="span5"><label>رابط الصورة</label> <input type="text" name="name['+num+'][img]" value=""  /></div><div class="span5"><label>مسار الصورة</label><input type="text" name="name['+num+'][url]" value=""  /></div></div><br clear="all" /><a onclick="return removeads(\'adsw'+num+'\');" href="#">حذف الاعلان</a><hr /></div>');

			   });

            });
            </script>
       <?php
	}
	
  }

?>