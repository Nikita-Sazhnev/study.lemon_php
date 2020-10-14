<?php
namespace library;

class Auth
{
    public static function isGuest()
    {
        if (empty($_SESSION['user'])) {
            return true;
        }
        return false;
    }
    public static function canAccess($role)
    {
        return $_SESSION['user']['role'] == $role;
    }
    public static function login($id, $role)
    {
        $_SESSION['user']['id'] = $id;
        $_SESSION['user']['role'] = $role;
    }
    public static function logout()
    {
        session_unset();
        session_destroy();
        header('Location: /');
    }
}