<?php
namespace library;

class Search
{
    /** Производит поиск по постам
     * @param string $search Поисковый запрос
     * @return array
     */
    public static function doSearch($search)
    {
        $db = Db::getDb();
        $sql = "SELECT * FROM `posts` WHERE `summary` LIKE '%$search%' OR `tags` LIKE '%$search%'";
        return $db->sendQuery($sql)->fetchAll();
    }
}