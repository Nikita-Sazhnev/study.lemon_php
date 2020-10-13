<?php
namespace controllers;

class ControllerAdmin extends \base\Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->view = new \base\View;
        $this->view->setLayout('admin');
    }
    public function actionIndex()
    {
        $this->view->setTitle('Admin');
        $this->view->render('admin-home', []);
    }
}