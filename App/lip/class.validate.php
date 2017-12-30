<?php
class validate {
   private $_register=null,
           $_passed=false,
           $_error=array(),
           $_lang=null,
           $_securty=null,
           $_resulte=null;

  public function __construct(){
    $this->_register=Registry::getInstancia();
    $this->_db=$this->_register->_db;
    $this->_lang=$this->_register->_langswitch;
    $this->_securty=$this->_register->_securty;
  }

  public function check($source,$items=array()){
        foreach($items as $item=>$rules){
           foreach($rules as $rule=>$rule_value){
              $value=isset($source[$item])?$source[$item]:'';
               if($rule=='required' and $rule_value==true and empty($value)) {
                   if(isset($rules['text']) and $rules['text']!=''){ 
                   $this->addErorr($item,$rules['text']);
                       }else{
                       $this->addErorr($item,_t("حقل مطلوب"));
                   }
               }else if($rule=='min'  and !empty($value) and $rule_value > strlen($value)){
                    $this->addErorr($item,_t(sprintf(_t("عدد الاحرف اقل من الحد المطلوب %d حرف"),$rule_value)));
               }else if($rule=='max' and !empty($value) and  $rule_value < strlen($value)){
                    $this->addErorr($item,sprintf(_t("عدد الاحرف تجاوزت الحد المطلوب %d حرف"),$rule_value));
               }else if($rule=='matches' and !empty($value) and isset($source['password']) and $source['password'] != $source['rpassword'] ){
                    $this->addErorr($item,_t("الرقم السرى غير مطابق"));
               }else if($rule=='matches_email' and !empty($value) and isset($source['email']) and $source['email'] != $source['remail'] ){
                    $this->addErorr($item,_t("البريد الالكترونى غير مطابق"));
               }else if($rule=='emailvar' and !empty($value) and $this->_securty->email($value) == false){
                    $this->addErorr($item,_t("هذا البريد غير صحيح"));
               } else if($rule=='int'  and !empty($value) and $this->_securty->filterInt($value) == false){
                     $this->addErorr($item,_t("هذا الرقم غير صحيح"));
               } else if($rule=='captcha'  and !empty($value) and session::get('code')!= $value){
                     $this->addErorr($item,_t("هذا الرقم غير صحيح"));
               }else if($rule=='unique'  and !empty($value)){
				   if(isset($rules['lang'])){
					   $value=$this->_securty->tities(language::qtrans_en($value));
					}else{
						 $value=$this->_securty->tities($value);
					}
                 $sql=$this->_db->query("select ". $this->_securty->tities($rules['name_id'])." from $rule_value where ". $this->_securty->tities($rules['name_id'])."='". $this->_securty->tities($value)."'");
                    if($sql->num_rows>0){
                         $this->addErorr($item,_t("موجود بالفعل"));

                     }
               }else if($rule=='is_ok'  and !empty($value)){
				   if(isset($rules['lang'])){
					   $value=$this->_securty->tities(language::qtrans_en($value));
					}else{
						 $value=$this->_securty->tities($value);
					}
                 $sql=$this->_db->query("select ". $this->_securty->tities($rules['name_id'])." from $rule_value where ". $this->_securty->tities($rules['name_id'])."='". $this->_securty->tities($value)."'");
                    if($sql->num_rows==0){
                         $this->addErorr($item,_t("هذا الموضوع غير متوفر"));

                     }
               }else if($rule=='loginuser'  and !empty($value)){
				   if(is_array($rules['name_id']) and count($rules['name_id'])>0){
					   $add_more='';
					   $xxxx=0;
					   foreach($rules['name_id'] as $rowsfil){
						   if($rowsfil!=''){
							   if($xxxx==0){
								  $add_more.="";
							   }else{
								   $add_more.=" or ";
							   }
							 $add_more .=$rowsfil." = '". $this->_securty->tities($value)."' "; 
						   }
						$xxxx=$xxxx+1;   
					   }
				   }else{
					   $add_more=$rules['name_id']." = '". $this->_securty->tities($value)."' ";
				   }
				   
                     $sql=$this->_db->query("select * from $rule_value where $add_more limit 1");
                    if($sql->num_rows==0){
                         $this->addErorr($item,_t("هذا العضو غير موجود"));
                     }else{
                       $this->_resulte=$sql->fetch_assoc();
					   
                     }
               }

           }
        }


        if(empty($this->_error)){
          $this->_passed =true;
        }

  }

    public function addErorr($var,$error){
         $this->_error[$var]=$error;
    }
    public function errors(){
      return $this->_error;
    }
    public function passed(){
      return $this->_passed;
    }

  public function resulte(){
        return  $this->_resulte;
  }
}

?>