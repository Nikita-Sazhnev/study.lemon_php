<?php namespace library;

class Content
{
    protected $db;

    public function __construct()
    {
        $this->db = Db::getDb();
    }

    public function previewArticle()
    {
        $sql = "SELECT `id`,`title`,`url`,`img`,`views` FROM `posts` ORDER BY `id` DESC LIMIT 3";
        $result = $this->db->sendQuery($sql);
        return $result->fetchAll();
    }
}