<?php
class Controller{
    public function run($controller,$action) {
        $class_name = ucfirst($controller)."Controller";
        $method_name = $action."Action";
        
        
        if(class_exists($class_name, true))
        {
            $c = new $class_name;
            
        }
        else
        {
            $c = new DefaultController();
        }
        
        
        if(method_exists($c, $method_name))
        {
            $m = $method_name;
        }
        else
        {
            $m = "indexAction";
        }
        
        call_user_func(array($c,$m));
       //echo $controller,$action;
       $view = Core::getInstance()->getView();
       $html = $view->init($c->layout,$c->view,$c->data);
       echo $html;
       
    }
}
