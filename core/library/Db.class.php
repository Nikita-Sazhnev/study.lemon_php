<?php namespace library;

use Exception;
use \PDO;

class Db
{
    private static $_db = null;
    private $_link = null;

    private function __construct()
    {
        if (!file_exists(__DIR__ . '/../config/db.conf.php')) {
            throw new \Exception('Config file not found');
        }
        $config = require_once __DIR__ . '/../config/db.conf.php';
        $host = $config['host'];
        $dbname = $config['dbname'];
        $this->_link = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $config['user'], $config['pass']);
    }
    public static function getDb()
    {
        if (is_null(self::$_db)) {
            self::$_db = new self();
        }
        return self::$_db;
    }

    public function sendQuery($sql)
    {
        $result = $this->_link->query($sql);
        if (!$result) {
            throw new Exception('Не верный запрос');
        }
        return $result->fetchAll();
    }
    public function execPdo($sql, $data = '')
    {
        $result = $this->_link->prepare($sql);
        $result->execute($data);
        if (!$result->execute()) {
            throw new Exception('Ошибка исполнения екзекъюта');
        }
        return $result->fetchAll();
    }
    public function getSafeData($data)
    {
        $data = trim(preg_replace('/[\'\\\*\"\s\/]/', '', $data));
        return $data;
    }
}