<?php
class TagsController{
    public function indexAction()
    {
        $tags_array = Tags::getAllTags();
        print_r($tags_array);
    }
    
    public function addAction()
    {
        $add_tags = 'blyadstvo';
        Tags::addTags($add_tags);
    }
}
