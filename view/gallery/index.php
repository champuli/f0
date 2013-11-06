<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Load Album</title>
</head>
<body>
<div id="main">
    <div id="content"> 
        <form enctype="multipart/form-data" action="/gallery/load_album" method="post">
           <br> Название альбома <input type="text" value="" name="name_album" /><br />
            <input type="hidden" name="MAX_FILE_SIZE" value="3000000">
           <br> Обложка альбома <input name="album_cover" type="file"><br />
           <br> <input type="submit" value="создать альбом" /><br />          
        </form>
    </br><a href="/gallery/show_albums">click here to see all albums</a>
    </div> 
</div>
</body>
</html>