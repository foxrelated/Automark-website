<?php
  class typecarController extends controller{
    private $_type;
    public function __construct(){
        parent::__construct();
       $this->_view->setStyle('admin');
       $this->_view->assign('_title','الصفحه الرئيسية');
       $this->_view->assign('_page','ادارة انواع ال ');
       $this->_category=$this->loadModel("category",'cars');
       $this->_type=$this->loadModel('typecar');
       $this->_view->assign('data_type',$this->_type);
       $this->_view->assign('_category',$this->_category);
    }
    public function index($id=''){
		
		$this->_view->assign('rowstypeSql',$this->_type->getTypeAll(array('category'=>(int)$id)));
        $this->_view->tmpDir('index');

    }
     public function add(){
         $this->_view->assign('_sub','اضافة نوع سيارة  جديده');

            if($this->_input->get('add')==1){

      if($this->_token->check($this->_input->get('token'))){

          $this->_validate->check($_POST,
          array(
                  'type'=>array(
                         'required'=>false
                  ),
                  'name'=>array(
                        'required'=>true
                  ) ,'category'=>array(
                        'required'=>true
                  ) ,
                  'imagemsh'=>array(
                        'required'=>false
                  )
                  )
          );

                if($this->_validate->passed()){
                        $sqlArray=array(
                            'type'=>$this->_input->get('type'),
                            'name'=>language::qtrans_en($this->_input->get('name')),
                            'images'=>$this->_input->get('imagemsh'),
                            'category'=>$this->_input->get('category')
                        );

                     if($this->_type->insert($sqlArray)){
                        $this->_view->assign('_msg',"تم الاضافة بنجاح");
                     }

                    }else{
                      $this->_view->assign('get',array_filter($_POST));
                      $this->_view->assign('error',$this->_validate->errors());
                }
            }
           }

        $this->_view->tmpDir('add');

    }
      public function edit($id){
         $this->_view->assign('_sub','تعديل موديل السيارة');

            if($this->_input->get('edit')==1){

      if($this->_token->check($this->_input->get('token'))){

          $this->_validate->check($_POST,
          array(
                  'type'=>array(
                         'required'=>false
                  ),
                  'name'=>array(
                        'required'=>true
                  ) ,
                  'imagemsh'=>array(
                        'required'=>false
                  )
            )
          );

                if($this->_validate->passed()){
                        $sqlArray=array(
                            'type'=>$this->_input->get('type'),
                            'name'=>language::qtrans_en($this->_input->get('name')),
                            'images'=>$this->_input->get('imagemsh'),
							'category'=>$this->_input->get('category'),
                            'id'=>$id
                        );

                     if($this->_type->edit($sqlArray)){
                        $this->_view->assign('_msg',"تم التعديل بنجاح");
                     }else{
                    throw new Exception(sprintf(_t('Error Database  %s '),'type car'));
                }

                    }else{

                      $this->_view->assign('error',$this->_validate->errors());
                }
            }
           }
        $this->_view->assign('datatype',$this->_type->getId($id));
        $this->_view->tmpDir('edit');

    }
      public function remove($sq,$id){
        if($sq=='sq'){
            if($this->_type->removeSub($id) and $this->_type->remove($id)){
                  session::redir('admin/typecar/');
            }
          }else if($sq=='sub'){
                  if($this->_type->remove($id)){
                      session::redir('admin/typecar/');
                  }
          }
    }
  }

?>