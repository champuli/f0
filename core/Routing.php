<?php
class Routing{
    protected $_uri;
    protected $_controller;
    protected $_action;

    public function __construct() {
        $this->_uri = Core::getInstance()->getRequest()->_uri;
        
        $this->_controller = "default";
        $this->_action = "index";
        $exp_uri = explode("?", $this->_uri);
        $ex_u = explode("/", $exp_uri[0]);
        
        if (!empty($ex_u[1]))
        {
            $this->_controller = $ex_u[1];
        }
        
        if (!empty($ex_u[2]))
        {
            $this->_action = $ex_u[2];
        }   
    }
    
    public function getController(){
        return $this->_controller;
    }
    
    public function getAction(){
        return $this->_action;
    }
    
}