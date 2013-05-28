<?php
include 'autoload.php';
include 'phpQuery-onefile.php';
session_start();
//print_r($_SERVER);
//print_r($_REQUEST);

//создаем экземпляр класса Core
Core::getInstance()->run($routing);