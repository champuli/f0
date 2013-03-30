<?php
class BaseModel{
    //public static $table="table_name";
    const TABLE='';
    
    public static function getAll()
    {
        $link = mysql_connect("localhost", 'root', "zapadlo222")
        or die("Could not connect: " . mysql_error());
        mysql_select_db('gallery', $link) or die('Can\'t use bb : ' . mysql_error());
        
        $show_all_z = array();
        $c = get_called_class();
        $get_que = mysql_query("SELECT * FROM ".$c::TABLE);
        
        while($show_get_all = mysql_fetch_assoc($get_que))
        {
            $show_all_z[] = $show_get_all;
        }
        
        return $show_all_z;
    }
}