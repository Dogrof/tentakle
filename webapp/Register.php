<!DOCTYPE HTML>
<html>
    <head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>Registration</title>
        <script src='source/js/RegisterScripts.js'></script>
    </head>
    <body background="source/img/Main.jpg">
		<h1 align ="Center"><font color="#08e8de" size="10">Введите свои данные ниже</font></h1>

  	<form name = "Main" action = "RegisterForm.php" method = "post" onsubmit='return validateAll(this);'>
        <fieldset>
            <div class="RegisterForm">
                <label for="Email"><font color="#ffb961" size="10">Email: </font></label>
                <input name = "Email" id="Email">
            </div>
            <div class="RegisterForm">
                <label for="FName"><font color="#ffb961" size="10">Имя: </font></label>
                <input name = "FName" id="FName">
            </div>
            <div class="RegisterForm">
                <label for="LName"><font color="#ffb961" size="10">Фамилия: </font></label>
                <input name = "LName" id="LName">
            </div>
            <div class="RegisterForm">
                <label for="Pass"><font color="#ffb961" size="10">Пароль: </font></label>
                <input type="password" name = "Pass" id="Pass">
            </div>
            <div class="RegisterForm">
                <label for="PassConf"><font color="#ffb961" size="10">Подтверждение: </font></label>
                <input type="password" name = "PassConf" id="PassConf">
            </div>
            <div class="RegisterForm">
                <input type = "submit" id="submit" value = "Отправить">
            </div>
        </fieldset>
	</form>
        <p align="center"><a href="index.php"><font color="#ffb961" size="10">Главная</font></a></p>
	</body>
</html>
