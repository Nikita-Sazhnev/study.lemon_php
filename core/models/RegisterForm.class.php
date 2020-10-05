<?php
namespace models;

class RegisterForm extends \base\BaseForm
{
    public $login;
    public $email;
    public $password;
    public $password_confirm;

    public function getRules()
    {
        return [
            'login' => ['required', 'unique'],
            'password' => ['required', 'confirm'],
            'email' => ['required'],
        ];
    }

    public function doRegister()
    {
        $password = md5($this->_data['password']);
        $sql = "INSERT INTO `users` (`login`,`email`,`pass`) VALUES (?,?,?)";
        $exec = array($this->_data['login'], $this->_data['email'], $password);
        $this->_db->execPdo($sql, $exec);
    }
}