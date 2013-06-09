<?php
class BaseController{
    public $data;
    public $view='index';
    public $layout='default';
    
    public function preExecute()
    {
        echo "preExecute Hello";
    }
}