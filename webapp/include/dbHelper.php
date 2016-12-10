<?php

define('FILE_DB_CONF', 'source/conf/db.conf');
define('DIR_SQLS', 'db/ddl');

define('PROP_HOST', 'host');
define('PROP_PORT', 'port');
define('PROP_DATABASE', 'database');
define('PROP_USER', 'user');
define('PROP_PASSWORD', 'password');

// Read dabase connection configs
//$dbConfigs = readDbConfis(FILE_DB_CONF);

function defaultDbConfigs() {
    return readDbConfis(FILE_DB_CONF);
}

function readDbConfis($configFile) {
    if (!file_exists($configFile)) {
        die ($configFile . " does not exist");
    } else {
        return parse_ini_file(FILE_DB_CONF);
    }
}

function createMysqliConnection() {

    $dbCreds = readDbConfis(FILE_DB_CONF);

    $mysqli = new mysqli(
        $dbCreds[PROP_HOST],
        $dbCreds[PROP_USER],
        $dbCreds[PROP_PASSWORD],
        $dbCreds[PROP_DATABASE]
    );

    if ($mysqli->connect_error) {
        die('Connection error (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
    }

    return $mysqli;
}
?>

