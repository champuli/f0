<!DOCTYPE html>
<html>
    <head>
         <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>index</title>
        <?php echo "<h2>".'you log as'.' '."<strong>".$_SESSION['login']."</strong></h2>"; ?>
    </head>
    <body>
        <form name="show_page" method="get" action="/admin/list">
        </form>      
    </body>
</html>    