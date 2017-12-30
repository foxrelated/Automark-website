<?php
  class models{

  private $_register;
  protected $_db;

    public function __construct(){
      $this->_register=Registry::getInstancia();
      $this->_db=$this->_register->_db;

    }
  }
?>