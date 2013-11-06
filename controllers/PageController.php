<?php
ini_set('error_reporting',E_ALL);
ini_set('dispay_errors',1);
class PageController extends BaseController{
    public function indexAction()
    { 
        if(isset($_REQUEST['page']))
        {
            $page = array();
            $get = addslashes($_REQUEST['page']);
            $qu = "SELECT * FROM pages WHERE url = '$get'";
            $page = db('cms')->getRow($qu); //esli ne nashi $page=> redirect na glavnyuy      
            $this->data['page_body'] = $page['page_title'];
            $this->data['page_name'] = $page['page_name']; 
        }   
    }
}
?>

