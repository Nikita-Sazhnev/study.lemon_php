<?php
namespace library;

class Request
{
    public static function isPost()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            return true;
        }
        return false;
    }

    public static function getPost()
    {
        return $_POST;
    }
    public static function getSearch()
    {
        return Db::getSafeData(($_GET['search_string']));
    }

    public static function isSearchEmpty()
    {
        return empty($_GET['search_string']);
    }

}