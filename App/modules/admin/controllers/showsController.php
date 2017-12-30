<?php
  class showsController extends controller{
    private $_shows;
    public function __construct(){
        parent::__construct();
       $this->_view->setStyle('admin');
       $this->_view->assign('_title','الصفحه الرئيسية');
       $this->_view->assign('_page','ادارة المعارض');

       $this->_shows=$this->loadModel('shows');
       $this->_view->assign('data_shows',$this->_shows);
    }
    public function index(){

        $this->_view->tmpDir('index');

    }
     public function add(){
         $this->_view->assign('_sub','ادارة المعارض');

            if($this->_input->get('add')==1){

      if($this->_token->check($this->_input->get('token'))){

          $this->_validate->check($_POST,
          array(

                  'name'=>array(
                        'required'=>true
                  ) ,
                  'imagemsh'=>array(
                        'required'=>false
                  ),'ads'=>array(
                        'required'=>false
                  ) ,
                  'act'=>array(
                        'required'=>false
                  ),
                  'type'=>array(
                        'required'=>true
                  )
                  )
          );

                if($this->_validate->passed()){
                        $sqlArray=array(
                            'name'=>$this->_input->get('name'),
                            'images'=>$this->_input->get('imagemsh'),
                            'ads'=>$this->_input->get('ads'),
                            'act'=>$this->_input->get('act'),
                            'type'=>$this->_input->get('type')
                        );
                     if($this->_shows->insert($sqlArray)){
                        $this->_view->assign('_msg',"تم الاضافة بنجاح");
                     }else{
                        throw new Exception(sprintf(_t('Error Database  %s '),' shows'));
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
         $this->_view->assign('_sub','ادارة المعارض');

            if($this->_input->get('edit')==1){

      if($this->_token->check($this->_input->get('token'))){

          $this->_validate->check($_POST,
          array(

                  'name'=>array(
                        'required'=>true
                  ) ,
                  'imagemsh'=>array(
                        'required'=>false
                  ) , 'ads'=>array(
                        'required'=>false
                  ) ,
                  'act'=>array(
                        'required'=>false
                  )
                  ,
                  'type'=>array(
                        'required'=>true
                  )
                  )
          );

                if($this->_validate->passed()){
                        $sqlArray=array(
                            'name'=>$this->_input->get('name'),
                            'images'=>$this->_input->get('imagemsh'),
                            'ads'=>$this->_input->get('ads'),
                            'act'=>$this->_input->get('act'),

                            'type'=>$this->_input->get('type') ,
                            'id'=>$id
                        );
                     if($this->_shows->edit($sqlArray)){
                        $this->_view->assign('_msg',"تم التعديل  بنجاح");
                     } else{
                    throw new Exception(sprintf(_t('Error Database  %s '),'shows'));
                }


                    }else{

                      $this->_view->assign('error',$this->_validate->errors());
                }
            }
           }
          $this->_view->assign('data',$this->_shows->getId($id));
        $this->_view->tmpDir('edit');

    }
      public function remove($id){
          if($this->_shows->remove($id)){

                session::redir('admin/shows/');
          }
    }
  }

?>