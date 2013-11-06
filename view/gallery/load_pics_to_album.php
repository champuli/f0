<?php foreach ($data as $k => $val): ?>
<form enctype="multipart/form-data" action="/gallery/load_pics_to_album" method="post">
<?php endforeach; ?>
<input type="hidden" name="MAX_FILE_SIZE" value="3000000">
Send this file: <input name="userfile" type="file">
<br>Description<input type="text" value="" name="description"/><br />
<input type="submit" value="Send File">
</form>
