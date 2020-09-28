<?php namespace library;

class Content
{
    protected $db;

    public function __construct()
    {
        $this->db = Db::getDb();
    }

    public function getContent($values, $table, $limit)
    {
        $sql = "SELECT $values FROM `$table` ORDER BY `id` DESC LIMIT $limit";
        $result = $this->db->sendQuery($sql)->fetchAll();
        return $result;

    }

}