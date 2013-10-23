<?php

function pr($var,$stop=false)
{
    $debug = debug_backtrace();
    $file = "";
    foreach($debug as $key => $d)
    {

        if(isset($d['file'])) 
            $file= $d['file'].":".$d['line'];

        $func = $d['function'];
        if(isset($d['class']))
        {
            $func = $d['class']."::".$func;
        }
        echo "run function <b>".$func."</b> in ".$file."<br />";
    }
    echo "<pre>";
    print_r($var);
    echo "</pre>";
    if($stop) exit;
}

 function GetRealIp()
        {
            if (!empty($_SERVER['HTTP_CLIENT_IP'])) 
            {
                $ip=$_SERVER['HTTP_CLIENT_IP'];
            }
            elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
            {
                $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
            }
            else
            {
                $ip=$_SERVER['REMOTE_ADDR'];
            }
            return $ip;
        }