<?php
$pass = mysql_connect("localhost", 'root', "zapadlo222")
or die("Could not connect: " . mysql_error());
mysql_select_db('cms', $pass) or die('Can\'t use bb : ' . mysql_error());
                    

$name = array('Lisa','Edward','John','Stacy','Kolin','Ted','Nancy','Austin','Aushley','Tom','Greg','Stiven','Sam','Korinne','Lane','Dereck','Lois','Natan','Toby','Malkolm');
        $surname = array('Johnson','Smith','Black','Aldridge','Howard','Bishop','Gilmore','Foster','Hodges','Vaughan','Simpson','Wallace','Murphy','Kirk','Davis','Brown','Hall','Wood','Evans','Moore');
        $c = count($name) -1;
        $s = count($surname)-1;
        
        $name_surname = array();

        for($i=0;$i<=2000000;$i++)
        {
            $u_c = rand(0, $c);
            $u_s = rand(0, $s);
            $day = time();
            $age = rand(10,50);

            $t_age = strtotime("- $age year");
            $t_age = date("Y-m-d", $t_age);

            $name_surname[$i]['name'] = $name[$u_c];
            $name_surname[$i]['surname'] = $surname[$u_s];
            $name_surname[$i]['age'] = $age;
            $name_surname[$i]['birth_date'] = $t_age;
        }   
        
        $counter = 0;
        $start_main_time = microtime(true);
        $start_time = microtime(true);
        foreach ($name_surname as $k => $v)
        {
            $insert_records[] = "('{$v['name']}','{$v['surname']}','{$v['birth_date']}','{$v['age']}')";       
            if(count($insert_records) >= 100)
            {
                $query_str_values = implode(",",$insert_records);
                //echo $query_str_values;
                $qu = "INSERT INTO `agename` (`name`, `surname`, `birth_date`, `age`) VALUES".$query_str_values;
                mysql_query($qu);
                $counter = $counter +100;
                $insert_records = array();
                if($counter%1000 == 0)
                {
                    $stop_time = microtime(true);
                    echo $counter." records: ".($stop_time - $start_time)." sec for 1000 inserts. total: ".($stop_time - $start_main_time)." sec\n";
                    $start_time = microtime(true);
                }
             }
        }
     

//insert into agename () values (1,2,3), (4,5,6), (7,8,9),     
?>

