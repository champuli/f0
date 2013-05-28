<?php
define('SHOW_ERRORS',true);

class DefaultController extends BaseController{
    public function indexAction(){
         echo __FUNCTION__."<br />";
        echo "Hello";
    }
}