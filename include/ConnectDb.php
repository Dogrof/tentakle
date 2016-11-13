<?php
error_reporting(0);
$db_host = 'localhost';
$db_user = 'tentakle';
$db_password = '1111';
$db_name = 'tentakle';

$link = mysql_connect($db_host, $db_user, $db_password, $db_name);
if (!$link) {
    die('<p style="color:red">'.mysql_connect_errno().' - '.mysql_connect_error().'</p>');
}

echo "<p align='center'><font color='red' size='8'>Успешное подключение к БД</font></p>";
?>