<?php
class DefaultController extends BaseController{
    public function indexAction(){
    }

    public function infoAction(){
        echo GetRealIp()."\n\n"; exit;
    }
}

?>
