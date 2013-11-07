<?php
/**
 * Class: Db
 * for working with mysql
 */
class Db
{
    protected $db_conn;
    /**
     * __construct
     *
     * @param mixed $db_name - name of database (add it to framework db config file first)
     */
    public function __construct($db_name) 
    {
        $core_db_conn = Core::getInstance()->getDb();
        if(!isset($core_db_conn[$db_name])) {
            trigger_error("db '$db_name' not exists in config",E_USER_ERROR);
        }

        $this->db_conn = $core_db_conn[$db_name];
        mysql_select_db($db_name, $this->db_conn) or die('Can\'t connect db : ' . mysql_error());
        mysql_query("SET NAMES utf8",$this->db_conn);
    }

    /**
     * commont mysql query function. use for queries you don't need response(insert, update, delete)
     *
     * @param mixed $sql - sql query string
     * @param array $params - values for placeholders. using: $db->execute("select count(*) from a where id=:id:",array('id'=>1))
     * @return mixed - resource if query has been executed normaly, false - on error
     */
    public function execute($sql,$params=array())
    {
        if (is_array($params) && !empty($params))
        {
            foreach ($params as $key => $value)
            {
                if (empty($value))
                {
                    echo "value for ".$key." is empty";
                    exit;
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

    /**
     * getAll - get all query result rows
     *
     * @param mixed $sql - sql query string
     * @param array $params - query params values. see 'execute' functoin for details
     * @return array - query result rows
     */
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

    /**
     * get result first row
     *
     * @param mixed $sql - sql string
     * @param array $params - query params values. see 'execute' functoin for details
     * @return array - result first row as array
     */
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

