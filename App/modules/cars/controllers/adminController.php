<?php
  class adminController extends controller{

    private $_category;
    private $_option;

  public function __construct(){
    parent::__construct();
   $this->_view->setStyle('admin');
   $this->_category=$this->loadModel("category");
   $this->_option=$this->loadModel('option','admin');


   $this->_view->assign('option',$this->_option);
  }
    public function index(){

        $this->_view->tmpDir('category','category');

    }
    public function add_category(){


    if($this->_input->get('add')==1){

      if($this->_token->check($this->_input->get('token'))){

          $this->_validate->check($_POST,
          array(
                  'name'=>array(
                         'required'=>true
                  )
                  ,
                  'form'=>array(
                        'required'=>false
                  )
                  )
          );

                if($this->_validate->passed()){
                        $sqlArray=array(
                            'name'=>language::qtrans_en($this->_input->get('name')),
                            'form'=>$this->_func->enJsonArray($this->_input->get('form'))
                        );

                     if($id_op=$this->_category->addCategory($sqlArray)){

                        $this->_view->assign('_msg',"تم الاضافة بنجاح");
                     }

                    }else{
                      $this->_view->assign('get',array_filter($_POST));
                      $this->_view->assign('error',$this->_validate->errors());
                }
            }
           }



         $value=array(
            'type'=>'form'
         );
        $this->_view->assign('option_form',$this->_option->getOption($value));
        $this->_view->tmpDir('add_category','add_category');
    }

  }

?>