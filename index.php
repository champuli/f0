<?php
ini_set('display_errors',1);

include 'autoload.php';
session_start();

//создаем экземпляр класса Core
Core::getInstance()->run($routing);
