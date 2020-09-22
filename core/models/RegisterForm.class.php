<?php
namespace models;

class RegisterForm extends \base\BaseForm
{
    public $login;
    public $password;
    public $password_confirm;

    public function getRules()
    {
        return [
            'login' => ['required', 'email', 'unique'],
            'password' => ['required', 'confirm'],

        ];
    }

    public function doRegister()
    {
        $password = md5($this->password);
        $sql = "INSERT INTO `user` (`login`,`pass`) VALUES (?,?)";
        $exec = array($this->login, $password);
        $this->_db->execPdo($sql, $exec);
    }
}