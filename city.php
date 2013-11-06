<?php
$pass = mysql_connect("localhost", 'root', "zapadlo222")
or die("Could not connect: " . mysql_error());
mysql_select_db('cms', $pass) or die('Can\'t use bb : ' . mysql_error());

$cities = array();
$fp = fopen('city_list.txt', 'r');
if($fp)
{
    while (!feof($fp))
    {
        $cont = fgets($fp);
        $array[] = $cont;
    }
}
fclose($fp);  

for ($k=1;$k<=6000;$k = $k+6)
{
    $cities[] = $array[$k];
}

foreach ($cities as $k => $val)
{
    $que = mysql_query("INSERT INTO city ('city') VALUES ('$val')"); 
}
        