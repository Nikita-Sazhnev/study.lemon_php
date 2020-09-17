<?php
namespace models;

class LoginForm extends \base\BaseForm
{
    public $login;
    public $password;

    public $rules = [
        'login' => ['required'],
        'password' => ['required'],
    ];
    public function validate()
    {
        // $validator = new Validator();
    }

    public function load($data)
    {
        $this->login = $this->_db->getSafeData($data['login']);
        $this->password = $this->_db->getSafeData($data['password']);
    }
}
