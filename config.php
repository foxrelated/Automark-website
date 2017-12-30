<?php
$GLOBALS['config']=array(



// Database
'mysql'=>array(
                'typeDB'=>'mysqli',
                'localhost'=>'localhost',
                'user'=> 'root',
                'pass'=>'',
                'db'=>'automark',
                'db_char'=>'utf8'
            ),
'dataBase_default_cars'=>array('imagemsh','model','modelcar','country','city','type','des','price'),

'remember'=>array(
                'cookie_name'=>'hash',
                'cookie_expire'=> '604800'
            ),

'session'=>array(
                'session_name'=>'userAppss',
                'session_token'=>'token'
            ),

'models'=>array('users','admin','cars','pages','access','messages','chat'),

'app_name'=>'mvc project',


'language_array'=>array(
    "ar"=>array("code"=>"ar-SA","dir"=>'rtl','name'=>'اللغه العربية'),
    "en"=>array("code"=>"en-GB","dir"=>'ltr','name'=>'اللغه الانجليزية') 
),


'app_company'=>'المطور لخدمات الويب',

'app_url'=>'www.elmtwer.com'

);

 ?>
