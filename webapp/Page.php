<?php
require_once('include/lib/Smarty/Smarty.class.php');
require_once('include/dbHelper.php');
require_once('include/Constants.php');
$link = createMysqliConnection();
$userID = $_SESSION[SessionConstants::SESSION_USER_ID];
$userFName = $_SESSION[SessionConstants::SESSION_USER_FName];
$userLName = $_SESSION[SessionConstants::SESSION_USER_LName];

$smarty = new Smarty();
$smarty->template_dir = 'source/templates/';
$smarty->compile_dir = 'source/templates_c/';
$smarty->config_dir = 'source/configs/';
$smarty->cache_dir = 'source/cache/';


$smarty->assign('userID', $userID);
$smarty->assign('userFName', $userFName);
$smarty->assign('userLName', $userLName);

$smarty->display('Header.tpl');
$smarty->display('Page.tpl');
$smarty->display('Footer.tpl');
?>
