<?php
  class switchlang{

      function register($text){
        $value='';
        switch($text){
          case "username":$value=_t("اسم المستخدم");break;
          case "password":$value=_t("كلمة المرور");break;
          case "rpassword":$value=_t("اعادة كلمة المرور");break;
          case "name":$value=_t("الاسم");break;
          case "age":$value=_t("العمر");break;
          case "mobile":$value=_t("الجوال");break;
          case "telphone":$value=_t("الهاتف");break;
          case "email":$value=_t("البريد الالكترونى");break;
          case "firstname":$value=_t("الاسم الاول");break;
          case "lastname":$value=_t("الاسم الاخير");break;
          case "using":$value=_t("اتفاقية الاستخدام");break;
        }
        return $value;
      }


            function carsStatus($text){
        $value='';
        switch($text){
          case 1:$value=_t("معطل");break;
          case 0:$value=_t("موافق عليه");break;
          case 2:$value=_t("بانتظار التفعيل");break;
         ;
        }
        return $value;
      }    

	  function carsStatusMazad($text){
        $value='';
        switch($text){
          case 0:$value=_t("قيد المزايدة");break;
          case 1:$value=_t("قيد المزايدة");break;
          case 2:$value=_t("تم البيع");break;
          case 3:$value=_t(" انتهاء الاعلان ");break;
         ;
        }
        return $value;
      }

   public function timeago($referencedate=0,$timepointer='',$measureby='', $autotext=true){
      
    if($timepointer == '') $timepointer = time();
    $Raw = $timepointer-$referencedate;
    $Clean = abs($Raw);
    $calcNum = array(array('s', 60),
                     array('m', 60*60),
                     array('h', 60*60*60),
                     array('d', 60*60*60*24),
                     array('y', 60*60*60*24*365));
    $calc = array('s' => array(1, 'ثانية'),
                  'm' => array(60, 'دقيقة'),
                  'h' => array(60*60, 'ساعه'),
                  'd' => array(60*60*24, 'يوم'),
                  'y' => array(60*60*24*365, 'سنة'));
     
    if($measureby == ''){
        $usemeasure = 's';
     
        for($i=0; $i<count($calcNum); $i++){
            if($Clean <= $calcNum[$i][1]){
                $usemeasure = $calcNum[$i][0];
                $i = count($calcNum);
            }       
        }
    }else{
        $usemeasure = $measureby;
    }
     
    $datedifference = floor($Clean/$calc[$usemeasure][0]);
     
    if($autotext==true && ($timepointer==time())){
        if($Raw < 0){
            $prospect = ' متبقي';
        }else{
            $prospect = ' منذ';
        }
    }
     
    if($referencedate != 0){
        if($datedifference == 1){
            return $prospect.' '.$datedifference . ' ' . $calc[$usemeasure][1];
        }else{
            return $prospect.' '. $datedifference . ' ' . $calc[$usemeasure][1];
        }
    }else{
        return 'No input time referenced.';
    }
}
	  
  }
?>