<?php
namespace library;

class Auth
{
    /** Определяет залогинен ли пользователь*/
    public static function isGuest()
    {
        return empty($_SESSION['user']);
    }

    /**Проверка на право доступа к определеным разделам сайта*/
    public static function canAccess($role)
    {
        if ($_SESSION['user']['role'] == $role) {
            return true;
        } else {
            header('HTTP/1.2 403 Forbidden');
            exit();
        }
    }

    /**Реализует логин Пользователя через сесси*/
    public static function login($id, $role)
    {
        $_SESSION['user']['id'] = $id;
        $_SESSION['user']['role'] = $role;
    }

    /**Разлогинивает Пользователя*/
    public static function logout()
    {
        session_unset();
        session_destroy();
        header('Location: /');
    }
}