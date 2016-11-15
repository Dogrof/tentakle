<?php
echo '<!DOCTYPE HTML>';
echo '<html>';
    echo '<head>';
echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8">';
echo '<title>Registration</title>';
    echo '</head>';
    echo '<body background="source/img/Main.jpg">';
echo '<h1 align ="Center"><font color="#ff8c00" size="10">Введите свои данные ниже</font></h1>';
  echo '<form name = "Main" action = "RegisterForm.php" method = "post">';
	echo '<p align ="center"><font color="#ff8c00" size="10">Email: </font><input name = "Email"></p>';
	echo '<p align ="center"><font color="#ff8c00" size="10">Имя: </font><input name = "FName"></p>';
	echo '<p align ="center"><font color="#ff8c00" size="10">Фамилия: </font><input name = "LName"></p>';
	echo '<p align ="center"><font color="#ff8c00" size="10">Пароль: </font><input name = "Pass"></p>';
	echo '<p align ="center"><font color="#ff8c00" size="10">Подтверждение: </font><input name = "PassConf"></p>';
	echo '<p align ="center"><input type = "Submit" value = "Отправить"></p>';
  echo '</form>';
    echo '</body>';
echo '</html>';
?>
