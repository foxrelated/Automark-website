 <?php


    $option=$this->loadModel('option','admin');

    $this->_view->assign('lib_func', $this->_func);
    $this->_view->assign('lib_token', $this->_token);
    $this->_view->assign('lib_lang', $this->_lang);
    $this->_view->assign('lib_input', $this->_input);
    $this->_view->assign('lib_seurty', $this->_securty);
    $this->_view->assign('lib_request', $this->_request);

    $this->_view->assign('lib_user',$this->loadModel('users','users'));
    $this->_view->assign('lib_messages',$this->loadModel('cp','messages'));
    $this->_view->assign('lib_typecar',$this->loadModel('typecar','admin'));

    $this->_view->assign('_adsfooter', $this->_func->jsonFeild($option->getCode('adsimg','option_o'),'dir','footer'));

        if(session::get("lang")){
                    $locale=system::get('language_array/'.session::get("lang")."/dir");
              }else{
                     $locale=system::get('language_array/'.system::get('default_language')."/dir");
              }


      $this->_view->assign('_dir',$locale);
      $this->_view->assign('language_array',system::get('language_array'));


 ?>