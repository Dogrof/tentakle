<?php
/**
 * Created by PhpStorm.
 * User: Администратор
 * Date: 12.11.2016
 * Time: 16:55
 */
header('Content-Type: text/html; charset= utf-8');
$db_host = 'localhost';
$db_user = 'tentakle';
$db_password = '1111';
$db_name = 'tentakle';

$link = mysqli_connect($db_host, $db_user, $db_password, $db_name);
if (mysqli_connect_errno()) {
    printf("Не удалось подключиться: %s\n", mysqli_connect_error());
    exit();
}

$Email = $_REQUEST['Email'];
$FName = $_REQUEST['FName'];
$LName = $_REQUEST['LName'];
$Pass = $_REQUEST['Pass'];
$PassConf = $_REQUEST['PassConf'];

$Result = mysqli_query($link, "INSERT INTO users (email, first_name, last_name) VALUES (($Email), ($FName), ($LName)'");
if ($Result) {
    echo ("Добавление прошло успешно");
} else {
    echo ("Данные не были добавлены");
}
mysqli_close($link);
?>