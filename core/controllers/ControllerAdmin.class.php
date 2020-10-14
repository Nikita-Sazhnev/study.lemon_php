<?php
namespace controllers;

use library\Auth;

class ControllerAdmin extends \base\Controller
{
    public function __construct()
    {
        parent::__construct();
        Auth::canAccess('admin');
        $this->view = new \base\View;
        $this->view->setLayout('admin');
    }

    public function actionIndex()
    {
        $this->view->setTitle('Admin Panel');
        $this->view->render('admin-home', []);
    }
}