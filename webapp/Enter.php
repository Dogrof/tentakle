
<?php
session_start();
$db_host = 'localhost';
$db_user = 'tentakle';
$db_password = '1111';
$db_name = 'tentakle';
$link = mysqli_connect($db_host, $db_user, $db_password, $db_name);

$Email = $_REQUEST['Email'];
$Pass = $_REQUEST['Pass'];
$Result = mysqli_query($link, "SELECT COUNT(*) as count FROM users where email = '$Email'");
if (!$Result) {
    die ($link->error);
}
if ($Result->fetch_assoc()['count'] == 1) {
    mysqli_free_result($Result);
    $Result = mysqli_query($link, "SELECT COUNT(*) as count FROM users where pass = '$Pass'");

    if (!$Result) {
        echo mysqli_error($link);
        die ($link->error);
    }
        if ($Result->fetch_assoc()['count'] == 1) {
            mysqli_free_result($Result);
            $Result = mysqli_query($link, "SELECT id FROM users WHERE email = '$Email'");
            if (!isset($_SESSION['ID'])) $_SESSION['ID']=$Result;
            mysqli_free_result($Result);
            header("Location: http://www.tentakle/webapp/Page.php");
            exit();
        }
        else {
            echo '<h1 align="center"><font color="#08e8de" size="10">Такой пользователь не зарегестрирован1</font></h1>';
            mysqli_free_result($Result);
        }
}
else {
    echo '<h1 align="center"><font color="#08e8de" size="10">Такой пользователь не зарегестрирован</font></h1>';
    mysqli_free_result($Result);
}
mysqli_close($link);
?>

<!DOCTYPE HTML>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Enter</title>
</head>
<body background="source/img/Main.jpg">
<h1 align ="Center"><font color="#08e8de" size="10">Введите свои данные ниже</font></h1>

<form name = "Main" action = "" method = "post" onsubmit=''>
    <fieldset>
        <div class="EnterForm">
            <label for="Email"><font color="#ffb961" size="10">Email: </font></label>
            <input name = "Email" id="Email">
        </div>
        <div class="EnterForm">
            <label for="Pass"><font color="#ffb961" size="10">Пароль: </font></label>
            <input type="password" name = "Pass" id="Pass">
        </div>
        <div class="EnterForm">
            <input type = "submit" id="submit" value = "Отправить">
        </div>
    </fieldset>
</form>
<p align="center"><a href="index.php"><font color="#ffb961" size="10">Главная</font></a></p>
</body>
</html>