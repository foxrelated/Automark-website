<?php

  class view{
    private $_item,
            $_request,
            $_file,
            $_js,
            $_jsPlugin,
            $_template,
            $_var,
            $_controller,
            $_modules,
            $_sider;

    public function __construct(Request $request){

              $this->_request=$request;
              $this->_js = array();
              $this->_file = array();
              $this->_jsPlugin = array();
              $this->_template = system::_data('default_style');
              $this->_item = '';
              $this->_vsr=array();
        $modules = $this->_request->getModuls();
        $this->_modules = $modules;
        $this->_controller = $this->_request->getController();

        if($modules){
             $this->_file['view'] = APP_PATH . 'modules' . DS . $modules  .DS.'views' .DS . $this->_controller  . DS;
            $this->_file['js'] = APP_PATH . 'modules/' . $modules . '/views/'. '/js/';
        }
        else{
            $this->_file['view'] = APP_PATH . 'views' . DS . $this->_controller . DS;
            $this->_file['js'] = APP_PATH . 'views/' . $this->_controller . '/js/';
        }
    }
   public function setStyle($name){
     $this->_template=$name;
   }
    public function assign($key,$val){
          $this->_var[$key] = $val;
    }
    public function sider($key){
          $this->_sider = $key;
    }
    public function tmpDir($show,$item=false,$noLayout=false){
       if(isset($item)){
          $this->item=$item;
        }
        $path=array(
            'urlsite'=>system::_data('url_site'),
            'namesite'=>system::_data('title_site'),
            'urladmin'=>system::_data('url_site').'admin/',
            'upload'=>system::_data('url_site').'Public/uploads/',
            'thumb'=>system::_data('url_site').'Public/uploads/thumb/',
            'public'=>system::_data('url_site').'Public/',
            'act_site'=>system::_data('act_site'),
            'message_act'=>system::_data('message_act'),
            'item'=>$this->item,
            'template'=>system::_data('url_site').'App/template/' . $this->_template . '/',
        ) ;


        if(is_array($this->_var) and count($this->_var)){
                 extract($this->_var);
         }

        $templateDir=APP_PATH  . DS . 'template'. DS . $this->_template . DS;

        $sider=isset($this->_sider)? $templateDir.$this->_sider.'.php':'';

       if(isset($noLayout['tmp']) and $noLayout['tmp']==true){

            $moduls=(isset($this->_modules) and $this->_modules!='')?$this->_modules.DS:'';
            $dirFile=$templateDir.$moduls.$this->_controller.DS.$show.'.php';
            //var_dump($dirFile);die;
       }else if (isset($noLayout['other']) and $noLayout['other']==true){
            $dirFile=$templateDir.$show.'.php';
            //var_dump($dirFile);die;
             include_once $dirFile;
             exit;
       }else{
            $dirFile=$this->_file['view'].$show.'.php';
            //var_dump($dirFile);die;
        }

         if($noLayout==true and  !is_array($noLayout) and is_readable($dirFile)){
                
				include_once $templateDir.'none-style.php';
                exit;
            }
 if(isset($noLayout['none_style']) and $noLayout['none_style']==true and is_readable($dirFile)){
              
				include_once $templateDir.'none-style.php';
                exit;
            }
        if(is_readable($dirFile)){
            include_once $templateDir.'style.php';
        }
    }

  }

?>
