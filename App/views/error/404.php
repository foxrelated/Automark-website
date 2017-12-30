<meta charset="utf-8">
هذه صفحه خطا
  <br>

السبب
<br>
<?php
  if(session::exists('_error')==true){
  echo session::get('_error');
  }

?>