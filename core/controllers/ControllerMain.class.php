<?php
namespace controllers;

use base\Controller;

class ControllerMain extends Controller
{
    public function actionIndex()
    {
        $this->view->setTitle('Lemon');
        $this->view->render('home', []);
    }
    public function actionLogin()
    {
        $this->view->setTitle('login');
        $this->view->render('login', []);
    }
    public function actionLogout()
    {

    }
    public function actionReg()
    {
        $this->view->setTitle(['Registration']);
        $this->view->render('reg', []);
    }
}
