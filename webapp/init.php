<?php

require_once 'include/LiquiPhpBase.php';

define('FILE_DB_CONF', 'conf/db.conf');
define('DIR_SQLS', 'db/ddl');

define('PROP_HOST', 'host');
define('PROP_PORT', 'port');
define('PROP_DATABASE', 'database');
define('PROP_USER', 'user');
define('PROP_PASSWORD', 'password');

// Read dabase connection configs
$dbConfigs = readDbConfis(FILE_DB_CONF);

// Migrate DB changes
$dbCreds = new DatabaseCredentials();
$dbCreds->host = $dbConfigs[PROP_HOST];
$dbCreds->port =  $dbConfigs[PROP_PORT];
$dbCreds->database = $dbConfigs[PROP_DATABASE];
$dbCreds->user = $dbConfigs[PROP_USER];
$dbCreds->password = $dbConfigs[PROP_PASSWORD];

$liquibase = new LiquiPhpBase($dbCreds, DIR_SQLS);
$liquibase->migrate();

function readDbConfis($configFile) {
	if (!file_exists($configFile)) {
		die ($configFile . " does not exist");
	} else {
		return parse_ini_file(FILE_DB_CONF);
	}
}
?>
