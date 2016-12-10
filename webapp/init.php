<?php

require_once 'include/dbHelper.php';
require_once 'include/LiquiPhpBase.php';

$dbCreds = defaultDbConfigs();

// Migrate DB changes
$dbCreds = new DatabaseCredentials();
$dbCreds->host = $dbConfigs[PROP_HOST];
$dbCreds->port =  $dbConfigs[PROP_PORT];
$dbCreds->database = $dbConfigs[PROP_DATABASE];
$dbCreds->user = $dbConfigs[PROP_USER];
$dbCreds->password = $dbConfigs[PROP_PASSWORD];

$liquibase = new LiquiPhpBase($dbCreds, DIR_SQLS);
$liquibase->migrate();

?>

