<?php
$option=$this->loadModel('option','admin');
$data_user=$this->loadModel('users','users');
    $this->_view->assign('lib_func', $this->_func);
    $this->_view->assign('lib_token', $this->_token);
    $this->_view->assign('lib_lang', $this->_lang);
    $this->_view->assign('lib_input', $this->_input);
    $this->_view->assign('lib_seurty', $this->_securty);
    $this->_view->assign('lib_request', $this->_request);
    $this->_view->assign('lib_acl',$this->_acl);

    $this->_view->assign('db_category',$this->loadModel('category','cars'));
    $this->_view->assign('lib_user',$this->loadModel('users','users'));
    $this->_view->assign('lib_messages',$this->loadModel('cp','messages'));
    $this->_view->assign('lib_typecar',$this->loadModel('typecar','admin'));
    $this->_view->assign('lib_city',$this->loadModel('city','admin'));
	$this->_view->assign('lib_option',$this->loadModel('option','admin'));
    $this->_view->assign('lib_chat',$this->loadModel('chat','chat'));

    $this->_view->assign('lib_user_id',session::get(system::get("session/session_name")));
	$this->_view->assign('lib_user_data',$data_user->resulte());  
    
        if(session::get("lang")){
                    $locale=system::get('language_array/'.session::get("lang")."/dir");
              }else{
                     $locale=system::get('language_array/'.system::_data('default_language')."/dir");
              }

      $this->_view->assign('_dir',$locale);
       $this->_view->assign('language_array',system::get('language_array'));
   
 ?>