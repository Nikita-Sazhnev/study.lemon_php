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
            'login' => ['required', 'unique'],
            'password' => ['required', 'confirm'],

        ];
    }

    public function doRegister()
    {
        $password = md5($this->password);
        $sql = "INSERT INTO `users` (`login`,`email`,`pass`) VALUES (?,?,?)";
        $exec = array('etst', 'test', 'test');
        $this->_db->execPdo($sql, $exec);
    }
}