<?php
class AdminController extends BaseController{
    public $layout = 'admin';
    public function indexAction()
    {
        
    }
    
    public function loginAction()
    {
        if(isset($_POST) && !empty($_POST))
        {
            $log = $_POST['login'];
            $pas = md5($_POST['pass']);

            $qu = "SELECT * FROM user WHERE login= '$log' and pass = '$pas'";
            $u = db('cms')->getRow($qu);
            if($u)
            {
                $_SESSION['is_login'] = $u['id'];
                header("Location:/admin/index");
                exit;
            } 
        }
        $this->view = 'login';
    }
    
    public function preExecute()
    {
        $action = Core::getInstance()->getRouting()->getAction();
        
        if($action != 'login')
        {
            if (isset($_SESSION['is_login']) && !empty($_SESSION['is_login']))
            {
                echo 'SESSION is login';
            } 
            else 
            { 
                header("Location:/admin/login");
                exit;
            }
        }
        else 
        {
            if (isset($_SESSION['is_login']) && !empty($_SESSION['is_login']))
            {
                header("Location:/admin/index");
                exit;
            } 
        }      
    }
}
?>
