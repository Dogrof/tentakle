<?php

require_once 'include/dbHelper.php';

$link = createMysqliConnection();

$Email = $_REQUEST['Email'];
$FName = $_REQUEST['FName'];
$LName = $_REQUEST['LName'];
$Pass = $_REQUEST['Pass'];
$PassConf = $_REQUEST['PassConf'];

$Result = mysqli_query($link, "SELECT COUNT(*) as count FROM users where email = '$Email'");
if (!$Result) {
    die ($link->error);
}

if ($Result->fetch_assoc()['count'] == 0) {
    mysqli_free_result($Result);

    $Result = mysqli_query($link, "INSERT INTO users (email, first_name, last_name, pass) VALUES ('$Email', '$FName', '$LName', '$Pass')");
    if (!$Result) {
        echo 'Не удалось отправить данные', mysqli_error($link);
    } else {
        echo '<h1 align="center"><font color="#08e8de" size="10">Вы успешно зарегестрировались</font></h1>';
    }
} else {
    echo '<h1 align="center"><font color="#08e8de" size="10">Такой Email уже зарегестрирован</font></h1>';
}

mysqli_close($link);
?>

<!DOCTYPE>
<html>
<head>
    <title>Registration</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<body background="source/img/Main.jpg">
<ul>
    <li><p align="center"><a href="index.php"><font color="#ffb961" size="10">Главная</font></a></p></li>
    <li><p align="center"><a href="Register.php"><font color="#ffb961" size="10">Вернутся</font></a></p></li>
</ul>
</body>
</html>
