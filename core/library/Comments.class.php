<?php
namespace library;

class Comments extends Content
{
    public function getComments($parent, $place)
    {
        $sql = "SELECT * FROM `comments` WHERE `parent_id` = $parent AND `place_id` = $place ORDER BY `id` ASC";
        $result = $this->db->sendQuery($sql)->fetchAll();
        return $result;
    }

}