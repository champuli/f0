<?php
class BaseModel{
    //public static $table="table_name";
    const TABLE='';
    const DB='cms';
    
    public static function getAll()
    {
        $c = get_called_class();
        return db($c::DB)->getAll("SELECT * FROM ".$c::TABLE); 
    }
    
    public static function getByUrl()
    {
        if(isset($_POST['page_id']) && !empty($_POST['page_id']))
        {
//            $page_id = intval($_POST['page_id']);
//            $page_name = addslashes($_POST['page_name']);
//            $page_title = addslashes($_POST['page_title']);
//            $url = addslashes($_POST['url']);            
            $params = array(
                'page_id' => $_POST['page_id'],
                'page_title' => $_POST['page_title'],
                'page_name' => $_POST['page_name'],
                'url' => $_POST['url'],
            );
            
            $qu = "UPDATE pages SET page_name=:page_name:,page_title=:page_title:,`url`=:url: WHERE id = :page_id:";
            
            //db('cms')->execute("UPDATE pages SET page_name='$page_name',page_title='$page_title',`url`='$url' WHERE id = $page_id");
            
            $u = db('cms')->execute($qu,$params);        
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
}