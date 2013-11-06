<!DOCTYPE html>
<html>
    <head>
         <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>Echo</title>
        <script language="javascript" type="text/javascript"
src="/var/www/tinymce/js/tinymce/tinymce.js"></script>
<script language="javascript" type="text/javascript">
tinyMCE.init({
  mode : "textareas",
  elements : "elm_content"

});
</script> 
    </head>
    <body>
        <form method="post" action="doadd.php">
<textarea id="elm_content" name="content" rows="15" cols="50">
<?php echo htmlspecialchars($data);?>
</textarea>
<br />
<input type="submit" name="save" value="Submit" />
</form>
    </body>
</html>    