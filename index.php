<?php
include 'autoload.php';
//print_r($_SERVER);
//print_r($_REQUEST);

//создаем экземпляр класса Core
Core::getInstance()->run($routing);