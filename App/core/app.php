<?php

class App{
     
     public static  function Run(request $p){

              $modul= $p->getModuls();
              $controller= $p->getController().'Controller';
              $method= $p->getMethod();
              $params= $p->getParams();

                  if($modul){
                            $path_controller=APP_PATH.'modules'.DS.$modul.DS.'controllers'.DS.$controller.'.php';
                      if(!is_readable($path_controller)){
                            $path_controller=null;
                             throw new Exception('Erorr Not File Modules / Controllers' );
                        }
                   } else{
                              $path_controller=APP_PATH.'controllers'.DS.$controller.'.php';
                   }

                   if(is_readable($path_controller)){
                         require_once $path_controller;
                          $controller = new $controller;

                          if(!is_callable(array($controller,$method))){
                                $method='index';
                          }

                          if(!isset($params)){
                                call_user_func(array($controller,$method));
                          }else{
                                call_user_func_array(array($controller,$method),$params);
                          }

                   }else{
                            throw new Exception('Erorr Not File  Controllers');
                   }



     }


}
?>