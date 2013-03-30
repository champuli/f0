<?php
class Tags extends BaseModel{
     const TABLE = 'tags';
//    public static function getAllTags()
//    { 
//        $link = mysql_connect("localhost", 'root', "zapadlo222")
//        or die("Could not connect: " . mysql_error());
//
//        mysql_select_db('gallery', $link) or die('Can\'t use bb : ' . mysql_error());
//        
//        $t =  mysql_query("SELECT * FROM `tags`");
//        $show_all_tag = array();
//        
//        while($show_tag = mysql_fetch_assoc($t))
//        {
//            $show_all_tag[] = $show_tag;
//        }
//        
//        return $show_all_tag;
//    }
    
    public static function addTags($add_tags)
    {
        $link = mysql_connect("localhost", 'root', "zapadlo222")
        or die("Could not connect: " . mysql_error());

        mysql_select_db('gallery', $link) or die('Can\'t use bb : ' . mysql_error());
        
      
        $t = mysql_query("SELECT * FROM tags where tags_name = '$add_tags'");
        $n = mysql_num_rows($t);
        $t_ar = mysql_fetch_assoc($t);
        if($n==0)
        {
           $req_tag = mysql_query("INSERT INTO `tags` (`tags_name`) VALUES ('$add_tags')");
           $que_id_tags = mysql_query("SELECT MAX(id) AS max_id FROM tags");
           $fetch_id_tags = mysql_fetch_assoc($que_id_tags);
           $id_tags = $fetch_id_tags['max_id']; 
           return $id_tags;   
        }
        
        else
        {
            $id_tags = $t_ar['id'];
            return $id_tags;
        }
        
    }
}

