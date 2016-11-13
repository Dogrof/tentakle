<?php
/**
 * Created by PhpStorm.
 * User: Администратор
 * Date: 12.11.2016
 * Time: 16:55
 */
require_once 'ConnectDb.php';
$Email = $_REQUEST['Email'];
$FName = $_REQUEST['FName'];
$LName = $_REQUEST['LName'];
$Pass = $_REQUEST['Pass'];
$PassConf = $_REQUEST['PassConf'];
$insert_sql = "INSERT INTO users (email, first_name, last_name)" . "VALUES('{$Email}', '{$FName}', '{$LName}');"; mysql_query($insert_sql);

?>