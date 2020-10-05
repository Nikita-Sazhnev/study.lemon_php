<?php
namespace library;

class Comments extends Content
{
    public function getComments($parent, $limit)
    {
        $sql = "SELECT * FROM `comments` WHERE `parent_id` = $parent ORDER BY `id` ASC LIMIT $limit";
        $result = $this->db->sendQuery($sql)->fetchAll();
        return $result;
    }
}