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

}