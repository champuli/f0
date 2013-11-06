<?php foreach ($data as $k => $val): ?>
<div class="album_cover">
    <a href="/gallery/show_albums"><?php echo $val['name']; ?></a></br>
    <a href="/gallery/load_pics_to_album?album=<?php echo $val['id']; ?>"><img src="http://dev.aimbbs.org/<?php echo $val['cover_path']; ?>"/></a>
</div>
<?php endforeach; ?>
