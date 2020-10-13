<?php
namespace library;

class Search
{
    public static function doSearch($search)
    {
        $db = Db::getDb();
        $sql = "SELECT * FROM `posts` WHERE `summary` LIKE '%$search%' OR `tags` LIKE '%$search%'";
        return $db->sendQuery($sql)->fetchAll();
    }
}