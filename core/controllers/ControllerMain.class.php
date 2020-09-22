<?php
namespace controllers;

use base\Controller;
use library\Auth;
use library\Request;
use models\LoginForm;

class ControllerMain extends Controller
{
    public function actionIndex()
    {
        if (Auth::isGuest()) {
            $model = new LoginForm();
            if (Request::isPost()) {
                if ($model->load(Request::getPost()) and $model->validate()) {
                    if ($model->doLogin()) {
                        header("Location: /");
                    }
                }
            }
            $this->view->setTitle('Lemon');
            $this->view->render('home', []);
        } else {
            throw new \Exception("Forbiden", 403);

        }

    }
    public function actionLogin()
    {
        $this->view->setTitle('login');
        $this->view->render('login', []);
    }
    public function actionLogout()
    {
        if (!Auth::isGuest()) {
            Auth::logout();
            header("Location: /");
        } else {
            throw new \Exception("Forbiden", 403);

        }
    }
    public function actionReg()
    {
        if (Auth::isGuest()) {
            $model = new \models\RegisterForm();
            if (Request::isPost()) {
                if ($model->load(Request::getPost()) && $model->validate()) {
                    if ($model->doRegister()) {
                        header("Location: /");
                    }
                }
            }
            $this->view->setTitle('Registration');
            $this->view->render('reg', ['mode' => $model]);
        }

    }
}