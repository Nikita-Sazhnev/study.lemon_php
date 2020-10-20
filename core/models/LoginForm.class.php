<?php
namespace models;

use library\Auth;

class LoginForm extends \base\BaseForm
{
    public $login;
    public $password;
    public $email;
    public $role;
    public $id;
    public $default_name;

    /** Устанавливает правила валидации формы
     * @return array
     */
    public function getRules()
    {
        return [
            'login' => ['requaired'],
            'password' => ['requaired'],
        ];
    }
    /** Логинит пользователя на сайте через сессию
     * @return bool
     */
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

    public function update()
    {
        if (!empty($_FILES['img_src']['name'])) {
            $imageName = $_FILES['img_src']['name'];
            UploadForm::uploadImage($_FILES['img_src'], $imageName);
        } else {
            $imageName = $this->_data['default_name'];
        }
        $sql = "UPDATE `users` SET `login`=?, `email`=?, `role`=?, `avathar` =? WHERE `id` =?";
        $exec = [$this->_data['login'], $this->_data['email'], $this->_data['role'], $imageName, $this->_data['id']];

        $this->_db->execPdo($sql, $exec);
    }

}