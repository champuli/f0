</br><a href="/admin/add">click here if you want add new page</a>
<?php foreach ($data as $k=> $d): ?>
</br><a href="/admin/pageedit?id=<?php echo $d['id']; ?>"><?php echo $d['page_name']; ?></a>
<?php endforeach; ?>     