<?php
class AdminController extends BaseController{
    public $layout = 'css';

    public function indexAction()
    {
    }
    
    public function loginAction()
    {
        if(isset($_POST) && !empty($_POST))
        {
//            $log = $_POST['login'];
//            $pas = md5($_POST['pass']);
            $param = array(
                'login' => $_POST['login'],
                'pass' => md5($_POST['pass']),
            );

            $qu = "SELECT * FROM user WHERE login= :login: and pass = :pass:";
            $u = db('cms')->getRow($qu,$param);
         
            if($u)
            {
                $_SESSION['is_login'] = $u['id'];
                $_SESSION['login'] = $log; 
                $this->layout = 'css';
                header("Location:/admin/index");
                exit;
            }
        }
        $this->layout = 'notlogin';        
        $this->view = 'login';  
    }
    public function logoutAction()
    {
        unset($_SESSION['is_login']);
        header("Location:/admin/login");
        die();
    }

        public function preExecute()
    {
        $action = Core::getInstance()->getRouting()->getAction();
        
        if($action != 'login')
        {
            if (isset($_SESSION['is_login']) && !empty($_SESSION['is_login']))
            {
                //phpinfo();
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
    
    public function addAction()
    {
        $this->view = 'add';

        if(isset($_POST) && !empty($_POST))
        {
            $page_name = $_POST['page_name'];
            $page_title = $_POST['page_title'];
            $url = $_POST['url'];
           
            $que = "INSERT INTO `pages` (`page_name`, `page_title`,`url`) VALUES ('$page_name','$page_title', '$url')"; 
            db('cms')->execute($que);
        }
        
    }
    
    public function listAction()
    {
        $pages = Page::getAll();
        $this->data = $pages;
        $this->view = 'list';
    }
    
     public function pageeditAction()
    {
        $this->view = 'pageedit';

        if(isset($_POST['page_id']) && !empty($_POST['page_id']))
        {
            $page_id = intval($_POST['page_id']);
            $page_name = addslashes($_POST['page_name']);
            $page_title = addslashes($_POST['page_title']);
            $url = addslashes($_POST['url']);
            db('cms')->execute("UPDATE pages SET page_name='$page_name',page_title='$page_title',`url`='$url' WHERE id = $page_id");
            header("Location:/admin/pageedit?id=$page_id");exit;
        }
        
        if(isset($_REQUEST['id']) && !empty($_REQUEST['id']))
        {
            //echo "</br>".$_REQUEST['id'];
            $id = $_REQUEST['id'];
            $resource = db('cms')->getRow("SELECT * FROM pages WHERE id = '$id'");
            $this->data['page'] = $resource;
        }
    }
    
    public function echoAction()
    {
        $this->view = 'echo'; 
        $this->data = "Yobannyi redaktor";
    }
    
}
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">