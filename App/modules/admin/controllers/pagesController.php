<?php
  class pagesController extends controller{
    private $_pages;
    public function __construct(){
        parent::__construct();
       $this->_view->setStyle('admin');
       $this->_view->assign('_title','الصفحه الرئيسية');
       $this->_view->assign('_page','ادارة الصفحات ');

       $this->_pages=$this->loadModel('pages');

       $this->_view->assign('data_pges',$this->_pages);


    }
    public function index(){

        $this->_view->tmpDir('index');

    }
     public function add(){
         $this->_view->assign('_sub','اضافة صفحه  جديده');

            if($this->_input->get('add')==1){

      if($this->_token->check($this->_input->get('token'))){

          $this->_validate->check($_POST,
          array(
                  'name'=>array(
                         'required'=>true
                  ),'order'=>array(
                         'required'=>false
                  ),
                   'subject'=>array(
                        'required'=>false
                   )
                  )
          );

                if($this->_validate->passed()){
                        $sqlArray=array(
                            'name'=>language::qtrans_en($this->_input->get('name')),
                            'dir'=>$this->_input->get('dir'),
                            'order'=>$this->_input->get('order'),
                            'subject'=>language::qtrans_en($this->_input->get('subject'))
                        );
                     if($this->_pages->insert($sqlArray)){
                        $this->_view->assign('_msg',"تم الاضافة بنجاح");
                     }
                    }else{
                      $this->_view->assign('get',array_filter($_POST));
                      $this->_view->assign('error',$this->_validate->errors());
                }
            }
           }

         $this->_view->tmpDir('add');
         $path['template']=system::_data("url_site").'App/template/admin/';
    ?>
        <!-- BEGIN JAVASCRIPT CODES FOR THE CURRENT PAGE -->
        <script src="<?php echo $path['template']; ?>plugins/wysihtml5/wysihtml5-0.3.0.min.js"></script>
    <script src="<?php echo $path['template']; ?>plugins/bootstrap.wysihtml5/bootstrap-wysihtml5.js"></script>

    <script src="<?php echo $path['template']; ?>plugins/ckeditor/ckeditor.js"></script>

    <script>
        /*<![CDATA[*/
        $(function() {
            $('#wysiwyg1').wysihtml5({
                "stylesheets": ["<?php echo $path['template']; ?>plugins/bootstrap.wysihtml5/css/wysiwyg-color.css"]
            });
                        var editorGray = CKEDITOR.replace( 'ckeditor-grayar' , {
                 skin : 'social-gray'
            });
			 var editorGray = CKEDITOR.replace( 'ckeditor-grayen' , {
                 skin : 'social-gray'
            });
        });
        /*]]>*/
    </script>
    <?php


    }
    public function edit($id){
                $this->_view->assign('_sub','تعديل الصفحات');

            if($this->_input->get('edit')==1){

      if($this->_token->check($this->_input->get('token'))){

          $this->_validate->check($_POST,
          array(
                  'name'=>array(
                         'required'=>true
                  ),'order'=>array(
                         'required'=>false
                  ),
                   'subject'=>array(
                        'required'=>false
                   )
                  )
          );

                if($this->_validate->passed()){
                        $sqlArray=array(
                            'name'=>language::qtrans_en($this->_input->get('name')),
                            'dir'=>$this->_input->get('dir'),
                            'order'=>$this->_input->get('order'),
                            'subject'=>language::qtrans_en($this->_input->get('subject'))  ,
                            'id'=>$id
                        );
                     if($this->_pages->edit($sqlArray)){
                        $this->_view->assign('_msg',"تم التعديل بنجاح");
                     }
                    }else{
                      $this->_view->assign('error',$this->_validate->errors());
                }
            }
           }

           if(!count($this->_pages->getId($id))){
             session::redir(404);
           }
           $this->_view->assign('get',$this->_pages->getId($id));
         $this->_view->tmpDir('edit');
         $path['template']=system::_data("url_site").'App/template/admin/';
    ?>
        <!-- BEGIN JAVASCRIPT CODES FOR THE CURRENT PAGE -->
        <script src="<?php echo $path['template']; ?>plugins/wysihtml5/wysihtml5-0.3.0.min.js"></script>
    <script src="<?php echo $path['template']; ?>plugins/bootstrap.wysihtml5/bootstrap-wysihtml5.js"></script>

    <script src="<?php echo $path['template']; ?>plugins/ckeditor/ckeditor.js"></script>

    <script>
        /*<![CDATA[*/
        $(function() {
            $('#wysiwyg1').wysihtml5({
                "stylesheets": ["<?php echo $path['template']; ?>plugins/bootstrap.wysihtml5/css/wysiwyg-color.css"]
            });
                       var editorGray = CKEDITOR.replace( 'ckeditor-grayar' , {
                 skin : 'social-gray'
            });
			 var editorGray = CKEDITOR.replace( 'ckeditor-grayen' , {
                 skin : 'social-gray'
            });
        });
        /*]]>*/
    </script>
    <?php

    }
      public function remove($id){

                  if($this->_pages->remove($id)){
                      session::redir('admin/pages/');
                  }


    }
  }

?>