<?php
class View{

    public function init($layout,$view,$data)
    {
        $controller = Core::getInstance()->getRouting()->getController();
        
        $view_file = Core::getInstance()->getRequest()->getAttribute('DOCUMENT_ROOT').'/view/'.$controller."/".$view.'.php';
        $layout_file = Core::getInstance()->getRequest()->getAttribute('DOCUMENT_ROOT').'/layout/'.$layout.'.php';
        
        if (!file_exists($view_file)) { 
            die("View file $view_file not exsist");
        }
        
        if (!file_exists($layout_file)) { 
            echo "View file $layout_file not exsist";
          //die("View file $layout_file not exsist");
        }
        
        ob_start();
        include $view_file;
        $content = ob_get_contents();
        ob_end_clean(); 
        
        ob_start();
        include $layout_file;
        $html = ob_get_contents();
        ob_end_clean();
        return $html;
    }
            
}