<?php
$list_mysql_db = array(
     'cms' => array(
        'host' => 'localhost',
        'user' => 'root',
        'password' => 'zapadlo222'),

     'sell' => array(
        'host' => 'localhost',
        'user' => 'root',
        'password' => 'zapadlo222'),
    
    'gallery' => array(
        'host' => 'localhost',
        'user' => 'root',
        'password' => 'zapadlo222'),
);

function db($db_name)
{
    return new Db($db_name);
}
?>
