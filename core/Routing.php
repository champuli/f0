<?php
class Routing{
    protected $_uri;
    protected $_controller;
    protected $_action;
    public $routing_config_array;


    public function __construct($routing_config_array) {
        $this->_uri = Core::getInstance()->getRequest()->_uri;
        $this->routing_config_array = $routing_config_array;
        
        $this->_controller = "default";
        $this->_action = "index";
        $exp_uri = explode("?", $this->_uri);
        $ex_u = explode("/", $exp_uri[0]);
        
        $routing_from_config = false;
        foreach ($this->routing_config_array as $key => $val)
        {
            if ($this->_uri == $key)
            {
                $this->_controller = $val[0];
                $this->_action = $val[1];
                $routing_from_config = true;
            }
        }
        
        //$cms_url = trim($exp_uri[0]);
        //$cms_url = substr($cms_url, 1);
        //$cms_url = addslashes($cms_url);
        //$result = db('cms')->getRow("select * from pages where url = '$cms_url'");
        
        //if(!empty($result))
        //{
          //  $this->_controller = "page";
            //$this->_action = "index";
            //$_REQUEST['page'] = $cms_url;
            //return;
        //}
        
        if (!empty($ex_u[1]) && !$routing_from_config) 
        {
            $this->_controller = $ex_u[1];
        }
        
        if (!empty($ex_u[2]) && !$routing_from_config)
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