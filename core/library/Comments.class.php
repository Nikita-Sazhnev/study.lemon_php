<?php
namespace library;

class Comments extends Content
{
    public function getComments($parent)
    {
        $sql = "SELECT * FROM `comments` WHERE `parent_id` = $parent ORDER BY `id` ASC";
        $result = $this->db->sendQuery($sql)->fetchAll();
        return $result;
    }
}
