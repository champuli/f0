<script language="javascript" type="text/javascript" src="/js/js/tinymce/tinymce.js"></script>
<script type="text/javascript">
tinyMCE.init({
  mode : "textareas",
  elements : "elm_content"
});
</script> 
<form name="add_page" method="post" action="/admin/add">

Название страницы <input name="page_name" type="text" size="45"></input></br>
Описание страницы</br> <textarea class="mceNoEditor" rows="10" cols="50" name="page_title"></textarea></br>

Url <input name="url" type="text" size="35"></input></br>

<input type="submit" name="sub" value="Добавить страницу"></br>
</form>      

 </br><a href="/admin/list">click here to see all available pages</a>   