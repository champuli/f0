<?php
class Core{
    protected $request;
    protected $routing;
    protected $controller;
    protected $view;
    protected $db = array();
    protected $user;

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
        global $routing, $list_mysql_db; 
        foreach ($list_mysql_db as $name => $parts)
        {
            $connect = mysql_connect($parts['host'],$parts['user'],$parts['password']);
            if(!($connect))
            {
                die("Could not connect: " . mysql_error());
            }
            else 
            {
                $this->db[$name] = $connect;
            }
        }

        $this->routing_config = $routing;
        $this->getInstance()->request      = new Request();
        $this->getInstance()->routing      = new Routing($this->routing_config);
        $this->getInstance()->controller   = new Controller();
        $this->getInstance()->view         = new View();
        $this->getInstance()->user         = new User();
    }
    
    public function getDb()
    {
        return $this->db;
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
    public function getView(){
        return self::getInstance()->view;
    }
    public function getUser(){
        return self::getInstance()->user;
    }
}
