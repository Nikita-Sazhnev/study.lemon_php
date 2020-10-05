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
    public function getArticleByDiff($diff)
    {
        $sql = "SELECT * FROM `posts` WHERE `difficult` = '$diff' ORDER BY `id` DESC LIMIT 3";
        $result = $this->db->sendQuery($sql)->fetchAll();
        return $result;
    }

    public function getInfoById($col, $id)
    {
        $sql = "SELECT `$col` FROM `users` WHERE `id` = $id LIMIT 1";
        $result = $this->db->sendQuery($sql)->fetch();
        return $result[$col];
    }
}