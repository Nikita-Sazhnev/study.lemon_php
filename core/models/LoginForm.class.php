<?php
namespace models;

use library\Auth;

class LoginForm extends \base\BaseForm
{
    public $login;
    public $password;

    public function getRules()
    {
        return [
            'login' => ['requaired'],
            'password' => ['requaired'],
        ];
    }

    public function doLogin()
    {
        $password = md5($this->_data['password']);
        $login = $this->_data['login'];

        $sql = "SELECT `login`,`role`,`id` FROM `users` WHERE `login` = '$login' AND `pass` = '$password'";
        $result = $this->_db->sendQuery($sql);
        $user = $result->fetch();

        if ($result->rowCount() != 0) {
            Auth::login($user['id'], $user['role']);
            return true;
        } else {
            return false;
        }

    }

}