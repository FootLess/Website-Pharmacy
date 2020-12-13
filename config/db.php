<?php

/**
 * Инициализация подключения к БД
 * 
 */

$dblocations = "127.0.0.1";
$dbname = "myshop";
$dbuser = "root";
$dbpasswd = "root";

$db = mysqli_connect($dblocations, $dbuser, $dbpasswd);

if (!$db) {
    echo "Ошибка доступа к MySql";
    exit();
}

//Устанавливает кодировку по умолчанию для текущего соединения
mysqli_set_charset($db, 'utf8');

if (!mysqli_select_db($db, $dbname)) {
    echo "Ошибка доступа к БД:{$dbname}";
    exit();
}
