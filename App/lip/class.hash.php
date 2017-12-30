<?php

  class hash{
        public function make($string,$salt=null){
          return hash('sha256',$string.$salt);
        }
        public function salt($length){
          return mcrypt_create_iv($length);
        }
        public function unique(){
          return $this->make(uniqid());
        }

  }
?>