<?php
  class cpController extends controller{

    private $_access;
    private $_cp;
    private $_city;

    function __construct(){
       parent::__construct();

        // $this->_access=$this->loadModel("access");
            $this->_view->setStyle('admin');
            $this->_view->assign('_page','ادارة الرسائل');
            $this->_cp=$this->loadModel("cp");
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
   public  function index(){

               if($this->_input->get('type')=='act' or $this->_input->get('type')=='des'){
                           $x=0;
                           $dateStatus=($this->_input->get('type')=='act')?1:2;
                           foreach($this->_input->get('status') as $rowsq){
                                  $vact=array("id"=>$rowsq,'status'=>$dateStatus);

                                 if($this->_cp->active($vact)){
                                       $idcp= $this->_cp->getId($rowsq);
                                        $this->_func->jsonRes($idcp['subject']);

                                         $fname=$this->_func->jRes('name').' '.$this->_func->jRes('lastname');
                                          $femail=$this->_func->jRes('email');
                                          $name=system::_data("title_site");
                                          $email=system::_data("email_admin");
                                          $title='تم الموافقه على طلبك';

                          if($this->_input->get('type')=='act'){
                               $msg="
                                   تم تاكيد الحجز الخاص بك<br>
                                   الاسم : ".$fname."<br>
                                   الجوال : ".$this->_func->jRes('mobile')."<br>
                                   مواعيد التسليم : ".$this->_func->jRes('datestart')->date.' '.$this->_func->jRes('datestart')->time."<br>
                                   مواعيد الاستلام : ".$this->_func->jRes('dateend')->date.' '.$this->_func->jRes('dateend')->time."<br>

                               مشاهده تفاصيل السيارة<br>
                                <a href='".system::_data("url_site")."cars/index/id/".$rowsq."'>الرابط التالى</a>
                                <br>
                                 <a href='".system::_data("url_site")."pages/index/contact'>تواصل معنا</a>
                              ";
                    }else{
                              $msg="
                                   تم رفض الحجز الخاص بك<br>
                                   الاسم : ".$fname."<br>
                                   الجوال : ".$this->_func->jRes('mobile')."<br>
                                   مواعيد التسليم : ".$this->_func->jRes('datestart')->date.' '.$this->_func->jRes('datestart')->time."<br>
                                   مواعيد الاستلام : ".$this->_func->jRes('dateend')->date.' '.$this->_func->jRes('dateend')->time."<br>

                               مشاهده تفاصيل السيارة<br>
                                <a href='".system::_data("url_site")."cars/index/id/".$rowsq."'>الرابط التالى</a>
                                <br>
                                 <a href='".system::_data("url_site")."pages/index/contact'>تواصل معنا</a>
                              ";

                    }
                    $valueemail=array(
                        'name'=>$name,
                        'email'=>$email,
                        'femail'=>$femail,
                        'title'=>$title,
                        'msg'=>$msg
                    );
                         if($this->_func->sendMail($valueemail)){
                                  $x++;
                                 }
                          }
                          if(count($this->_input->get('status'))==$x){
                             $this->_view->assign('_msg',"تم التحديث بنجاح");
                          }


             }
             }

               $this->_view->tmpDir('index');

    }

        public function send($id){
         $g=$this->_cp->getId($id);
         $this->_func->jsonRes($g['subject']);

                     if($this->_input->get('send')==1){

      if($this->_token->check($this->_input->get('token'))){

          $this->_validate->check($_POST,
          array(
                  'subject'=>array(
                        'required'=>true
                  )
              )
          );

                if($this->_validate->passed()){
                  $name=$this->_input->get('name');
                  $email=$this->_input->get('email');


                    $valueemail=array(
                        'name'=>$name,
                        'email'=>system::_data("email_admin"),
                        'femail'=>$email,
                        'title'=>'رد : طلب تاجير سيارة ',
                        'msg'=>nl2br($this->_input->get('subject'))
                    );
                         if($this->_func->sendMail($valueemail)){
                             $this->_view->assign('_msg',_t("تم الارسال بنجاح"));
                         }else{
                            $this->_view->assign('_msg',_t("حاول مره اخرى"));
                         }

                    }else{

                      $this->_view->assign('error',$this->_validate->errors());
                }
            }
           }



        $this->_view->assign("data",$g);
        $this->_view->tmpDir('send');
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
                        var editorGray = CKEDITOR.replace( 'ckeditor-gray' , {
                 skin : 'social-gray'
            });
        });
        /*]]>*/
    </script>
    <?php
        }

         public function remove($id){

            if($this->_cp->remove($id)){
                  session::redir('messages/cp');
            }

    }

  }
?>