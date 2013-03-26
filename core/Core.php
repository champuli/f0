<?php
class Core{
    protected $request;
    protected $routing;
    protected $controller;
    protected $view;
    
    private static $_instance;

    private function __construct() {
        $this->request      = new Request();
        $this->routing      = new Routing();
        $this->controller   = new Controller();
        $this->view         = new View();
    }
    
    private function __clone() {
    }

    protected static function getInstance()
    {
        if (null === self::$_instance) {
            self::$_instance = new self();
        }
        return self::$_instance; 
    }
    
    public function run() {
        echo print_r(self::getInstance());
    }
}
