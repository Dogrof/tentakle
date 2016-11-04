<?php

/**
 * Created by PhpStorm.
 * User: stas
 * Date: 11/4/16
 * Time: 1:21 AM
 */

class DatabaseCredentials {
    public $host = 'localhost';
    public $port = '3306';
    public $database = 'tentakle';
    public $user = 'tentakle';
    public $password = '1111';
}

class DbChangeset {

    public $sqlFile;

    function getSql() {
        return file_get_contents($this->sqlFile);
    }
}

class LiquiPhpBase
{
    const DDL_CHANGELOG_TABLE = <<<'EOT'
        CREATE TABLE IF NOT EXISTS CHANGELOG(
	        ID INTEGER PRIMARY KEY AUTO_INCREMENT,
	        FILE_NAME VARCHAR(120) NOT NULL,
	        EXECUTE_DATE DATETIME DEFAULT CURRENT_TIMESTAMP
        );
EOT;

    private $mysqli;
    private $dbCreds;
    private $changesetsDir;

    function __construct(DatabaseCredentials $dbCreds, $changesetsDir) {
        $this->dbCreds = $dbCreds;
        $this->changesetsDir = $changesetsDir;
    }

    function migrate() {

        $changesets = $this->getChangesets($this->changesetsDir);

        $this->openConnection($this->dbCreds);
        $this->initDatabaseChangelogTable();

        foreach ($changesets as $changeset) {
            $this->processChangeset($changeset);
        }

        $this->closeConnection();
    }

    function openConnection(DatabaseCredentials $dbCreds) {
        $mysqli = new mysqli(
            $dbCreds->host,
            $dbCreds->user,
            $dbCreds->password,
            $dbCreds->database
            );

        if ($mysqli->connect_error) {
            die('Connection error (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
        }

        $this->mysqli = $mysqli;
    }

    function closeConnection() {
        $this->mysqli->close();
    }

    function initDatabaseChangelogTable() {
        if ($this->mysqli->query(self::DDL_CHANGELOG_TABLE) === TRUE) {
            // Executed
        } else {
            die("Unable to create changelog table");
        }
    }

    function getChangesets($changesetsDir) {
        $dbChangesets = array();
        $dir = new DirectoryIterator($changesetsDir);
        foreach ($dir as $fileinfo) {
            if (!$fileinfo->isDot()) {

                $dbChangeset = new DbChangeset();
                $dbChangeset->sqlFile = $fileinfo->getPathName();
                $dbChangesets[] = $dbChangeset;
            }
        }
        return $dbChangesets;
    }

    function processChangeset(DbChangeset $changeset) {

        $sql = $changeset->getSql();

        if (!$this->mysqli->multi_query($sql)) {
            die("Failed to execute:\n" . $sql);
        } else {
            // Success
        }
    }

}