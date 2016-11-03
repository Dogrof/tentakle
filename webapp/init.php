<?php

define('FILE_DB_CONF', 'conf/db.conf');
define('DIR_SQLS', 'db/ddl');

define('PROP_HOST', 'host');
define('PROP_PORT', 'port');
define('PROP_DATABASE', 'database');
define('PROP_USER', 'user');
define('PROP_PASSWORD', 'password');

// Read dabase connection configs
if (!file_exists(FILE_DB_CONF)) {
	echo "not exists";
} else {
	$dbConfigs = parse_ini_file(FILE_DB_CONF);
	//var_dump( $dbConfigs );
}

// Find all SQL changeset files
$sqlFiles = array();
$dir = new DirectoryIterator(DIR_SQLS);
foreach ($dir as $fileinfo) {
    if (!$fileinfo->isDot()) {

        $sqlFiles[] = $fileinfo->getPathName();
    }
}

$mysqli = new mysqli($dbConfigs[PROP_HOST], $dbConfigs[PROP_USER], $dbConfigs[PROP_PASSWORD], $dbConfigs[PROP_DATABASE]);

if ($mysqli->connect_error) {
    die('Connection error (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
}

$changeLogTableSql = 
"CREATE TABLE IF NOT EXISTS CHANGELOG(
	ID INTEGER PRIMARY KEY AUTO_INCREMENT,
	FILE_NAME VARCHAR(120) NOT NULL,
	EXECUTE_DATE DATETIME DEFAULT CURRENT_TIMESTAMP
);";

if ($mysqli->query($changeLogTableSql) === TRUE) {

} else {
	die("Unable to create changelog table");
}


foreach ($sqlFiles as $sqlFile) {
    $sql = file_get_contents($sqlFile);
	if (!$mysqli->multi_query($sql)) {
		die("Failed to execute:\n" . $sql);
	} else {
		echo "successfully executed:\n" . $sql;
	}
}

$mysqli->close();

?>
