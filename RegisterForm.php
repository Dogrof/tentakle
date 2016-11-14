<?php
/**
 * Created by PhpStorm.
 * User: Администратор
 * Date: 12.11.2016
 * Time: 16:55
 */
$db_host = 'localhost';
$db_user = 'tentakle';
$db_password = '1111';
$db_name = 'tentakle';


$link = mysqli_connect($db_host, $db_user, $db_password, $db_name);

if (!$link) {
    die('<p style="color:red">'.mysqli_connect_errno().' - '.mysqli_connect_error().'</p>');
}

$Email = $_REQUEST['Email'];
$FName = $_REQUEST['FName'];
$LName = $_REQUEST['LName'];
$Pass = $_REQUEST['Pass'];
$PassConf = $_REQUEST['PassConf'];
$SendInf = "INSERT INTO users (email, first_name, last_name)" . "VALUES('{$Email}', '{$FName}', '{$LName}');";

$Query = mysqli_query($SendInf);
mysqli_close($link);
?>