<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>Календарь уборки ReIndex</title>
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
            <td><?php if(isset($d['Masik']['tasks']) && is_array($d['Masik']['tasks'])): ?>
                <?php foreach ($d['Masik']['tasks'] as $t) echo $t."</br>"; ?>
                <?php else: ?>
                 &nbsp;
                <?php endif; ?>
            </td>
            <td>&nbsp;&nbsp;&nbsp;</td>
            <td><?php if(isset($d['Alenka']['tasks']) && is_array($d['Alenka']['tasks'])): ?>
                <?php foreach ($d['Alenka']['tasks'] as $t) echo $t."</br>"; ?>
                <?php else: ?>
                 &nbsp;
                <?php endif; ?></td>
            <td>&nbsp;&nbsp;&nbsp;</td>
        </tr>
        <?php endforeach; ?>
       
</table>
    </body>
</html>   