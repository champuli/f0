<?php
class TagsController extends BaseController{
    public function indexAction()
    {
        $tags_array = Tags::getAll();
        $this->data['tags']=$tags_array;
        $this->view='tabl';
    }
    
    public function addAction()
    {
        $tagid = Tags::addTags('zaebalas choto333');
        //echo "<br>";
        //echo $tagid;
    }
    
    public function picsAction()
    {
        $pics_array = Pics::getAll();
        //print_r($pics_array);
    }
}
