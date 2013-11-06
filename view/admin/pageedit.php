<script language="javascript" type="text/javascript" src="/js/js/tinymce/tinymce.js"></script>
<script type="text/javascript">
tinyMCE.init({
  mode : "textareas",
  elements : "elm_content"
});
</script> 
<form name="edit_page" method="post" action="/admin/pageedit">
<input type="hidden" name="page_id" value="<?php echo $data['page']['id']; ?>">
Название страницы <input name="page_name" type="text" size="45" value="<?php echo  $data['page']['page_name']; ?>"></input></br>
Описание страницы</br> <textarea class="mceNoEditor" rows="10" cols="50" name="page_title"><?php echo  $data['page']['page_title']; ?></textarea></br>

Url <input name="url" type="text" size="35" value="<?php echo  $data['page']['url']; ?>"></input></br>

<input type="submit" name="submit" value="Редактировать страницу"></br>
</form>      

 </br><a href="/admin/list">click here to see all available pages</a>   