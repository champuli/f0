<?php
class Core{
    protected $request;
    protected $routing;
    protected $controller;
    protected $view;
    
    private static $_instance;

    private function __construct() {
    }
    
    private function __clone() {
    }

    public static function getInstance()
    {
        if (null === self::$_instance) {
            self::$_instance = new self();
            self::$_instance->init();
        }
        return self::$_instance; 
    }
    
    protected function init(){
        $this->getInstance()->request      = new Request();
        $this->getInstance()->routing      = new Routing();
        $this->getInstance()->controller   = new Controller();
        $this->getInstance()->view         = new View();

    }
    
    public function run() {
        $controller = self::getInstance()->getRouting()->getController();
        $action = self::getInstance()->getRouting()->getAction();
        self::getInstance()->getController()->run($controller,$action);
    }

    public function getRequest(){
        return self::getInstance()->request;
    }
    public function getRouting(){
        return self::getInstance()->routing;
    }
    public function getController(){
        return self::getInstance()->controller;
    }
}
