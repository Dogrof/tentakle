<?php
require_once 'include/Constants.php';
require_once 'include/dbHelper.php';

session_start();

if (isset($_SESSION[SessionConstants::SESSION_USER_ID])) {
    // User is already logged-in
    header('Location: /Page.php');
}

if (isset($_REQUEST['Email']) && isset($_REQUEST['Pass'])) {

    $Email = $_REQUEST['Email'];
    $Pass = $_REQUEST['Pass'];

    $connection = createMysqliConnection();

    $result = $connection->query("SELECT id FROM users where email = '$Email' AND pass = '$Pass' ");
    if (!$result) {
        die ($link->error);
    }

    $userExists = false;
    if ($result->num_rows > 0) {
        $userExists = true;
        $userFname = $result->fetch_assoc()['first_name'];;
        $_SESSION[SessionConstants::SESSION_USER_FName] = $userFname;
        $userLname = $result->fetch_assoc()['last_name'];;
        $_SESSION[SessionConstants::SESSION_USER_LName] = $userLname;
        $userId = $result->fetch_assoc()['id'];
        $_SESSION[SessionConstants::SESSION_USER_ID] = $userId;
        header('Location: /Page.php');
    }

    $connection->close();

}

?>

<!DOCTYPE HTML>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Enter</title>
</head>
<body background="source/img/Main.jpg">
<h1 align ="Center"><font color="#08e8de" size="10">Введите свои данные ниже</font></h1>

<?php
if (isset($userExists) && (!$userExists)) {
    ?>
    <p>User with such login and password doesn't exist</p>
    <?php
}
?>

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