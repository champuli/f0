<?php
class Db
{   
    protected $db_conn;
    public function __construct($db_name) 
    {
        $core_db_conn = Core::getInstance()->getDb();
        $this->db_conn = $core_db_conn[$db_name];
    }
    
    public function execute($sql)
    {
        return mysql_query($sql);
    }
    
    public function getAll($sql)
    {
        $show_all_z = array();
        $get_que = mysql_query($sql,$this->db_conn);
        
        while($show_get_all = mysql_fetch_assoc($get_que))
        {
            $show_all_z[] = $show_get_all;
        }
        return $show_all_z;
    }
    public function getRow($sql)
    {
        $get_que = mysql_query($sql,$this->db_conn);
        $show_get_all = mysql_fetch_assoc($get_que);
        return $show_get_all;
    }
}

