<?php
class Db
{   
    protected $db_conn;
    public function __construct($db_name) 
    {
        $core_db_conn = Core::getInstance()->getDb();
        $this->db_conn = $core_db_conn[$db_name];
        mysql_select_db($db_name, $this->db_conn) or die('Can\'t use bb : ' . mysql_error());
        mysql_query("SET NAMES utf8",$this->db_conn);
    }
     
    public function execute($sql,$params=array())
    {
        if (is_array($params) && !empty($params))
        {
            foreach ($params as $key => $value)
            {
                if (empty($value))
                {
                    echo "value for ".$key." is empty";exit;                    
                }
                if (is_numeric($value))
                {
                    $ins_value = $value;
                }
                else 
                {
                    $ins_value = "'".mysql_real_escape_string($value,$this->db_conn)."'";
                }                
                    $sql = str_replace(":$key:", $ins_value, $sql);
                    echo $sql."</br>";
            }
        }
        return mysql_query($sql,$this->db_conn);
    }
    
    public function getAll($sql,$params=array())
    {
        $show_all_z = array();
        $get_que = $this->execute($sql,$params);
        
        while($show_get_all = mysql_fetch_assoc($get_que))
        {
            $show_all_z[] = $show_get_all;
        }
        return $show_all_z;
    }

    public function getRow($sql,$params=array())
    {
        $get_que = $this->execute($sql,$params);
        if ($get_que)
        {
            $show_get_all = mysql_fetch_assoc($get_que);
            return $show_get_all;
        }
        return false;
    }    
}

