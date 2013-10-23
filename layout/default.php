<!DOCTYPE html>
<html>
    <head>
         <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
         <title><?php if (isset($data['page_name'])) echo $data['page_name']; ?></title>
    </head>
    <body>
        <?php echo $content; ?>
    </body>
</html>    