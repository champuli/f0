<?php
class GalleryController extends BaseController{
    public function indexAction()
    {
        
    }
    
    public function load_albumAction()
    {
        $this->view = 'index';                    
        define('SITE_PATH',dirname(dirname(__FILE__)));
//        include SITE_PATH.'/init.php';

        if(isset($_POST) && !empty($_POST))
        {
            
            $uploaddir = '/var/dev/pics_folder/';            
            if (move_uploaded_file($_FILES['album_cover']['tmp_name'], $uploaddir.$_FILES['album_cover']['name'])) 
            {
                $filename = $_FILES['album_cover']['name'];
                $image = new SimpleImage();
                $image->load($uploaddir.$_FILES['album_cover']['name']);
                $image->resizeToHeight(200);
                $image->save($uploaddir.'album_cover/'.$_FILES['album_cover']['name']);

                $name = $_POST['name_album'];
                $cover_path = 'pics_folder/album_cover/'.$_FILES['album_cover']['name'];

                $sql = "INSERT INTO `album` (`name`,`cover_path`) VALUES ('$name','$cover_path')";
                db('gallery')->execute($sql);
                
                print "File is valid, and was successfully uploaded.";
                //header("Location:/gallery/show_album");
            } else {
                print "There some errors!";
            }
        }
    }
    
    public function load_pics_to_albumAction()
    {
        $this->view = 'load_pics_to_album';
        define('SITE_PATH',dirname(dirname(__FILE__)));
        
        //$sql = "select * from `album`";
        //$d = db('gallery')->execute($sql);
        //while($s = mysql_fetch_assoc($d))
        //{
        //    $show_albums[] = $s;
        //}
        //$this->data = $show_albums;
        
        
        if(isset($_POST) && !empty($_POST))
        {
            $uploaddir = '/var/dev/pics_folder/';
            if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploaddir.$_FILES['userfile']['name'])) 
            {
                $filename = $_FILES['userfile']['name'];
                $image = new SimpleImage();
                $image->load($uploaddir.$_FILES['userfile']['name']);
                $image->resizeToHeight(800);
                $image->save($uploaddir.'/big/'.$_FILES['userfile']['name']);
                $image->resizeToHeight(100);
                $image->save($uploaddir.'/small/'.$_FILES['userfile']['name']);

                $id = $_GET['album'];
                $description = $_POST['description'];
                $cover_path_big = "pics_folder/big/".$_FILES['userfile']['name'];
                $cover_path_small = "pics_folder/small/".$_FILES['userfile']['name'];         
                print "File is valid, and was successfully uploaded.";
                
                $que = "INSERT INTO `pics`(`description`, `pics_path_big`, `pics_path_small`) VALUES ('$description', '$cover_path_big', '$cover_path_small')";
                echo "</br>".$que;
                echo "</br>".$id;
                //pr($_REQUEST);
                //db('gallery')->execute($que);
                
                
                } else {
                print "There some errors!";
             }
        }
    }

    public function show_albumsAction()
    {
        define('SITE_PATH',dirname(dirname(__FILE__)));
        $this->view = 'show_albums';
        $sql = "select * from `album`";
        $d = db('gallery')->execute($sql);
        while($s = mysql_fetch_assoc($d))
        {
            $show_albums[] = $s;
        }
        $this->data = $show_albums;
        $this->layout = 'show_albums';
    }
    
    public function show_pics_in_albumAction()
    {
        
    }
    
}
?>
