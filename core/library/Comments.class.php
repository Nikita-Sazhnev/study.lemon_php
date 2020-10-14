<?php
namespace library;

class Comments extends Content
{
    /** Возвращает массив коментариев
     * @param int $parent - id родительского комента,  0 - основная ветка
     * @param int $place - id поста к которому оставлен комент, 0 - главная
     */
    public function getComments($parent, $place)
    {
        $sql = "SELECT * FROM `comments` WHERE `parent_id` = $parent AND `place_id` = $place ORDER BY `id` ASC";
        $result = $this->db->sendQuery($sql)->fetchAll();
        return $result;
    }

}