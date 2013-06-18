<?php
//foreach ($data as $k => $d)
//    echo "<pre>";
//    print_r($data);

?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>Календарь уборки</title>
    </head>
    <body>
<table border="2" width="50%">  
        <tr>
                <th>число</th> <th>Масик</th> <th></th><th>Аленка</th><th></th>
        </tr>
        <?php foreach ($data as $k => $d): ?>
        <?php //pr($d,1); ?>
        <tr>
            <td><?php echo $k; ?></td> 
            <td><?php foreach ($d['Masik']['tasks'] as $t) echo $t."</br>"; ?></td>
            <td>&nbsp;&nbsp;&nbsp;</td>
            <td><?php foreach ($d['Alenka']['tasks'] as $a) echo $a."</br>"; ?></td>
            <td>&nbsp;&nbsp;&nbsp;</td>
        </tr>
        <?php endforeach; ?>
       
</table>
    </body>
</html>   
