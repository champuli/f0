<?php
include 'autoload.php';

echo "<pre>";
//print_r($_SERVER);
//print_r($_REQUEST);

//создаем экземпляр класса Core
Core::getInstance()->run($routing);