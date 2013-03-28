<?php
class Tags{
    
    public static function getAllTags()
    { 
        $link = mysql_connect("localhost", 'root', "root")
        or die("Could not connect: " . mysql_error());

        mysql_select_db('gallery', $link) or die('Can\'t use bb : ' . mysql_error());
        
        $t =  mysql_query("SELECT * FROM `tags`");
        $show_all_tag = array();
        
        while($show_tag = mysql_fetch_assoc($t))
        {
            $show_all_tag[] = $show_tag;
        }
        
        return $show_all_tag;
    }
    
    public static function addTags($add_tags)
    {
        $link = mysql_connect("localhost", 'root', "root")
        or die("Could not connect: " . mysql_error());

        mysql_select_db('gallery', $link) or die('Can\'t use bb : ' . mysql_error());
        
        $t =  mysql_query("SELECT * FROM tags where tags_name = '$add_tags'");
        $n = mysql_num_rows($t);
        if($n==0)
        {
           $req_tag = mysql_query("INSERT INTO `tags` (`tags_name`) VALUES ('$add_tags')");
        }
        
    }
}

