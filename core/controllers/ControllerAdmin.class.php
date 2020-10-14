<?php
namespace controllers;

use Exception;
use library\Auth;

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
        if (Auth::canAccess('admin')) {
            $this->view->setTitle('Admin');
            $this->view->render('admin-home', []);
        } else {
            throw new Exception("Cannot access", 403);
        }

    }
}