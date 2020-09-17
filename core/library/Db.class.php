<?php namespace library;

use \PDO;

class Db
{
    private static $_db = null;
    private $_link = null;

    private function __construct()
    {
        $config = require_once __DIR__ . '/../config/db.conf.php';
        $host = $config['host'];
        $dbname = $config['dbname'];
        $this->_db = new PDO("mysql:host=$host;dbname=$dbname", $config['user'], $config['pass']);
    }
    public static function getDb()
    {
        if (is_null(self::$_db)) {
            self::$_db = new self();
        }
        return self::$_db;
    }
}
