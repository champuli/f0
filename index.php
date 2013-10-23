<?php
ini_set('display_errors',1);
ini_set('erorr_reporting', E_ALL);
$routing=null;

include 'autoload.php';
session_start();

//создаем экземпляр класса Core
Core::getInstance()->run($routing);
