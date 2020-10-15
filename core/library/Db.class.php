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

    /** Возвращает новый объект класса Db с подключением бд(PDO)
     * @return object
     */
    public static function getDb()
    {
        if (is_null(self::$_db)) {
            self::$_db = new self();
        }
        return self::$_db;
    }

    /** Запрос на получение данных бд
     * @param sting $sql SQL запрос
     * @return array
     */
    public function sendQuery($sql)
    {
        $result = $this->_link->query($sql);
        if (!$result) {
            throw new Exception('Не верный запрос');
        }
        return $result;
    }
    /** Запрос на изменение данных бд
     * @param sting $sql SQL запрос
     * @return array
     */

    public function execPdo($sql, $data)
    {
        $result = $this->_link->prepare($sql);
        if (!$result->execute($data)) {
            throw new Exception('Ошибка исполнения екзекъюта');
        }
    }

    /** Удаление не желательных символов, обрезка лишних пробелов, замена управляющих HTML конструкций
     * @return string
     */
    public static function getSafeData($data)
    {
        $data = htmlspecialchars(trim(preg_replace('/[\'\\\*\"\/]/', '', $data)));
        return $data;
    }
}