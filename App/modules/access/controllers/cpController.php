<?php
  class cpController extends controller{

    private $_access;
    private $_cp;
    private $_city;

    function __construct(){
       parent::__construct();

        // $this->_access=$this->loadModel("access");
            $this->_view->setStyle('admin');
            $this->_view->assign('_page','الاكسسوارات والزينة');
            $this->_cp=$this->loadModel("cpa");
            $this->_option=$this->loadModel("option",'admin');
             $this->_city=$this->loadModel("city","admin");
              $this->_chat=$this->loadModel('newchat','chat');
$this->_user1=$this->loadModel('users','users');
   $id_user=session::get(system::get("session/session_name"));
   $user = $this->_user1->findName($id_user,"username");
   
   $this->_view->assign('_chat', $this->_chat->getAll(array('from'=>$user,'listGroup'=>1)));
            $this->_view->assign('_city',$this->_city);
		    $this->_view->assign('_cp',$this->_cp);
            $this->_view->assign('_option',$this->_option);
    }
    function index(){

               $this->_view->tmpDir('index');

    }

    function add(){
    $this->_view->assign('_sub','اضافة منتج جديده');

       if($this->_input->get('add')==1){

      if($this->_token->check($this->_input->get('token'))){

          $this->_validate->check($_POST,
          array(
                  'name'=>array(
                        'required'=>true
                  ) ,
                  'color'=>array(
                        'required'=>false
                  ) ,
                  'section'=>array(
                        'required'=>false
                  ) ,
                  'marka'=>array(
                        'required'=>false
                  ) ,
                  'price'=>array(
                        'required'=>false
                  ) ,
                  'country'=>array(
                        'required'=>false
                  ),
                  'city'=>array(
                        'required'=>false
                  ),
                  'special'=>array(
                        'required'=>false
                  ),
                  'imagemsh'=>array(
                        'required'=>false
                  )
                  )
          );

                if($this->_validate->passed()){
                         $optionMore=array('mobile'=>$this->_input->get('mobile'),'email'=>$this->_input->get('email'));
                          $sqlArray=array(
                            'name'=>$this->_input->get('name'),
                            'option_more'=>$this->_func->enJsonArray($optionMore),
                            'section'=>$this->_input->get('section'),
                            'marka'=>$this->_input->get('marka'),
                            'color'=>$this->_input->get('color'),
                            'price'=>$this->_input->get('price'),
                            'country'=>$this->_input->get('country'),
                            'city'=>$this->_input->get('city'),
                            'special'=>$this->_func->enJsonArray($this->_input->get('special')),
                            'images'=>$this->_func->enJsonArray($this->_input->get('imagemsh')),
                            'date'=>date("Y-m-d"),
                            'act'=>1
                        );
                     if($this->_cp->insert($sqlArray)){
                        $this->_view->assign('_msg',"تم الاضافة بنجاح");
                     }else{
                    throw new Exception(sprintf(_t('Error Database  %s '),'option'));
                }

                    }else{
                      $this->_view->assign('get',array_filter($_POST));
                      $this->_view->assign('error',$this->_validate->errors());
                }
            }
           }
               $this->_view->tmpDir('add');
    }
       public  function edit($id){
    $this->_view->assign('_sub','تعديل المنتج');

       if($this->_input->get('edit')==1){

      if($this->_token->check($this->_input->get('token'))){

          $this->_validate->check($_POST,
          array(
                  'name'=>array(
                        'required'=>true
                  ) ,
                  'color'=>array(
                        'required'=>false
                  ) ,
                  'section'=>array(
                        'required'=>false
                  ) ,
                  'marka'=>array(
                        'required'=>false
                  ) ,
                  'price'=>array(
                        'required'=>false
                  ) ,
                  'country'=>array(
                        'required'=>false
                  ),
                  'city'=>array(
                        'required'=>false
                  ),
                  'special'=>array(
                        'required'=>false
                  ),
                  'imagemsh'=>array(
                        'required'=>false
                  )
                  )
          );

                if($this->_validate->passed()){
                          $optionMore=array('mobile'=>$this->_input->get('mobile'),'email'=>$this->_input->get('email'));
                         
                          $sqlArray=array(
                            'name'=>$this->_input->get('name'),
                            'option_more'=>$this->_func->enJsonArray($optionMore),
                            'section'=>$this->_input->get('section'),
                            'marka'=>$this->_input->get('marka'),
                            'color'=>$this->_input->get('color'),
                            'price'=>$this->_input->get('price'),
                            'country'=>$this->_input->get('country'),
                            'city'=>$this->_input->get('city'),
                            'special'=>$this->_func->enJsonArray($this->_input->get('special')),
                            'images'=>$this->_func->enJsonArray($this->_input->get('imagemsh')),
                            'act'=>  $this->_input->get('act'),
                            'id'=>$id
                        );
                     if($this->_cp->edit($sqlArray)){
                        $this->_view->assign('_msg',"تم الاضافة بنجاح");
                     }else{
                    throw new Exception(sprintf(_t('Error Database  %s '),'option'));
                }

                    }else{

                      $this->_view->assign('error',$this->_validate->errors());
                }
            }
           }
               $this->_view->assign('accessId',$this->_cp->getId($id));;
               $this->_view->tmpDir('edit');
    }
         public function remove($id){

            if($this->_cp->remove($id)){
                  session::redir('access/cp');
            }

    }

  }
?>