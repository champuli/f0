<?php
class Request{
    
    var $_server;
    var $_request;
    var $_uri;
    var $_method;
    
    public function __construct() {
        $this->_server = $_SERVER;
        $this->_request = $_REQUEST;
        $this->_uri = $_SERVER['REQUEST_URI'];
        $this->_method = $_SERVER['REQUEST_METHOD'];
    }
    
    public function getAttribute($name){
        if (isset($this->_server[$name]))
        {
            return $this->_server[$name];
        }
    }
    
    public function getParameter($name){
        if (isset($this->_request[$name]))
        {
            return $this->_request[$name];
        }
    }
}