<?php namespace library;

class Content
{
    protected $db;

    public function __construct()
    {
        $this->db = Db::getDb();
    }

    public function getContent($table, $limit)
    {
        $sql = "SELECT * FROM `$table` ORDER BY `id` DESC LIMIT $limit";
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

    public function getAllInfoById($from, $id)
    {
        $sql = "SELECT * FROM `$from` WHERE `id` = $id LIMIT 1";
        $result = $this->db->sendQuery($sql)->fetch();
        if ($result == 0) {
            header("Location: /main/404", 404);
        } else {
            return $result;
        }

    }

    public function isActiveLike($user, $id)
    {
        if (!empty($user)) {
            $sql = "SELECT * FROM `likes` WHERE `user_id` = $user AND `comment_id` = $id";
            $result = $this->db->sendQuery($sql);
            if ($result->fetch() > 0) {
                echo "active-like";
            }}
    }

    public function likeAmount($id)
    {
        $sql = "SELECT * FROM `likes` WHERE `comment_id` = $id";
        $result = $this->db->sendQuery($sql);
        echo $result->rowCount();
    }
}