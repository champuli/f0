<?php

function pr($var,$stop=false)
{
    $debug = debug_backtrace();
    $file = "";
    foreach($debug as $key => $d)
    {
        //if($key==0) continue;

        if(isset($d['file'])) 
            $file= $d['file'].":".$d['line'];
        else
            $file= __FILE__.":".__LINE__;

        //print_r($d['file']);echo "<br>";
        $func = $d['function'];
        if(isset($d['class']))
        {
            $func = $d['class']."::".$func;
        }
        echo "run function <b>".$func."</b> in ".$file."<br />";
    }
    echo "<pre>";
    //print_r(debug_backtrace());
    print_r($var);
    echo "</pre>";
}
