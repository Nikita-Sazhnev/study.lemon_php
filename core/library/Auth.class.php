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
        if ($_SESSION['user']['role'] == $role) {
            return true;
        }
        return false;
    }
    public static function login($login, $role)
    {
        $_SESSION['user']['login'] = $login;
        $_SESSION['user']['role'] = $role;
    }
    public static function logout()
    {
        session_unset();
        session_destroy();
        header('Location: /');
    }
}