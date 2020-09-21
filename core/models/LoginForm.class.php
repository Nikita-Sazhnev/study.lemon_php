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
        $password = md5($this->password);
        $sql = "SELECT `id`,`role` FROM `users` WHERE `login` = '$this->login' AND `pass` = '$password'";

        $result = $this->_db->sendQuery($sql);
        if ($result->rowCount() == 0) {
            $user = $result->fetch();

            Auth::login($user['id'], $user['role']);
            return true;
        } else {
            return false;
        }

    }

    public function load($data)
    {
        $this->login = $this->_db->getSafeData($data['login']);
        $this->password = $this->_db->getSafeData($data['password']);
    }
}