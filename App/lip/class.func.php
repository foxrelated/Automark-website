<?php class func{
  private $_result;
     public  function jsonRes($v){
      if($v!=null){
      $this->_result=json_decode($v);
      }
      return $this;
    }

    public function jsonArray($v){
      if($v!=null){
      return json_decode($v);
      }
      return array();
    }
     public function enJsonArray($v){
       if(count($v) and is_array($v)){
      return json_encode(array_filter($v));
      }
      return '';
    }
    public function jsonId($v,$id){
      $r=$this->jsonArray($v);
         if(is_numeric($id)){
            return isset($r[$id])?$r[$id]:'' ;
         }
      return isset($r->$id)?$r->$id:'' ;
    }
      public function jsonFeild($v,$id,$c){
      $r=$this->jsonArray($v);
      $res='';
            foreach($r as $rows){
                if($rows->$id==$c){
                  $res= $rows;
                }
            }
      return $res;
    }
     public function jsonFeildArray($v,$id,$c){
      $r=$this->jsonArray($v);
      $res='';
            foreach($r as $rows){
                if($rows->$id==$c){
                  $res[]= $rows;
                }
            }
      return $res;
    }
    public function jRes($id){
      return $this->_result->$id;
    }
	public  function selected($tb,$tb2){
			if($tb==$tb2){
				return " selected='selected' ";
			}
	}
		public  function checked($tb,$tb2){
			if($tb==$tb2){
				return " checked='checked' ";
			}
	}
		public  function checkArray($tb,$array){
		   if(count($array) and is_array($array)){
			if(in_array($tb,$array)){
				return " checked='checked' ";
			}  }
			return '';
	}

    public function sendMail($array=array()){
              $mail = new phpmail();
                    $mail->From = $array['email'];
                    $mail->FromName = $array['name'];
                    $mail->Subject = $array['title'];
                    $mail->AltBody = 'áÇ íÏÚã ÎÇÏã ÇáÈÑíÏ ÇáÎÇÕ Èß HTML';
                    $mail->AddAddress($array['femail']);
                    $mail->Body = nl2br($array['msg'])." <br /> " ;


          if($mail->Send()){
            return true;
          }else{
            return false;
          }

    }

}
?>