<?php
class Core{
    public $request;
    public $routing;
    public $controller;
    public $view;

    public function run() {
        $this->request = new Request();
        $this->routing = new Routing();
        $this->controller = new Controller();
        $this->view = new View();
    }
}
