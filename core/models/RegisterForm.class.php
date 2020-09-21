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
}