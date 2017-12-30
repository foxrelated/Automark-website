<?php
class securty{

  public  function tities($text){
    return htmlentities($text, ENT_QUOTES, "UTF-8");
  }
 public function Email($email)
    {
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            return false;
        }

        return true;
    }
     public function getText($clave)
    {
        if(isset($clave) && !empty($clave)){
            $clave = htmlspecialchars($clave, ENT_QUOTES);
            return nl2br($clave);
        }

        return '';
    }
        public function getNum($clave)
    {
        if(isset($clave) && !empty($clave)){
            $clave = (string) preg_replace('/[^A-Z0-9_]/i', '', $clave);
            return trim($clave);
        }

    }
        public function getSql($clave)
    {
        if(isset($_POST[$clave]) && !empty($_POST[$clave])){
            $_POST[$clave] = strip_tags($_POST[$clave]);

            if(!get_magic_quotes_gpc()){
                $_POST[$clave] = mysql_real_escape_string($_POST[$clave], mysql_connect(DB_HOST, DB_USER, DB_PASS));
            }

            return trim($_POST[$clave]);
        }
    }

   public function getcode($clave)
    {
        if(isset($clave) && !empty($clave)){
            $clave = (string) preg_replace('/[^A-Z0-9_]{4-15}/i', '', $clave);
            return htmlentities(trim($clave)) ;
        }
    }
    public function filterInt($int)
    {
        if(is_numeric($int)){
            return true;
        }
        else{
            return false;
        }
    }
}

?>