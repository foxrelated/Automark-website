<?php
  class cityController extends controller{
    private $_city;
    public function __construct(){
        parent::__construct();
       $this->_view->setStyle('admin');
       $this->_view->assign('_title','الصفحه الرئيسية');
       $this->_view->assign('_page','ادارة المدن ');

       $this->_city=$this->loadModel('city');

       $this->_view->assign('data_city',$this->_city);


    }
    public function index(){

        $this->_view->tmpDir('index');

    }
     public function add(){
         $this->_view->assign('_sub','اضافة مدينة جديده');

            if($this->_input->get('add')==1){

      if($this->_token->check($this->_input->get('token'))){

          $this->_validate->check($_POST,
          array(
                  'country'=>array(
                         'required'=>false,
                  ),
                  'name'=>array(
                        'required'=>true,
                        'unique'=>'city' ,
                        'lang'=>true ,
                         'name_id'=>'name_c'
                  ),
                   'code'=>array(
                        'required'=>false,
                        'unique'=>'city' ,
                         'name_id'=>'code_c'
                   )
                  )
          );

                if($this->_validate->passed()){
                        $sqlArray=array(
                            'name'=>language::qtrans_en($this->_input->get('name')),
                            'sub'=>$this->_input->get('country'),
                            'code'=>$this->_input->get('code')
                        );
                     if($this->_city->insert($sqlArray)){
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
         $this->_view->assign('_sub','تعديل المدن');

            if($this->_input->get('edit')==1){

      if($this->_token->check($this->_input->get('token'))){

          $this->_validate->check($_POST,
          array(
                  'country'=>array(
                         'required'=>false
                  ),
                  'name'=>array(
                        'required'=>true
                  ),
                   'code'=>array(
                        'required'=>false
                   )
                  )
          );

                if($this->_validate->passed()){
                        $sqlArray=array(
                            'name'=>language::qtrans_en($this->_input->get('name')),
                            'sub'=>$this->_input->get('country'),
                            'code'=>$this->_input->get('code'),
                            'id'=>$id
                        );
                     if($this->_city->edit($sqlArray)){
                        $this->_view->assign('_msg',"تم الاضافة بنجاح");
                     }else{
                    throw new Exception(sprintf(_t('Error Database  %s '),'city'));
                }


                    }else{

                      $this->_view->assign('error',$this->_validate->errors());
                }
            }
           }
           $this->_view->assign('cityId',$this->_city->getId($id));
        $this->_view->tmpDir('edit');

    }
      public function remove($sq,$id){
          if($sq=='sq'){
            if($this->_city->removeSub($id) and $this->_city->remove($id)){
                  session::redir('admin/city/');
            }
          }else if($sq=='sub'){
                  if($this->_city->remove($id)){
                      session::redir('admin/city/');
                  }
          }

    }
  }

?>