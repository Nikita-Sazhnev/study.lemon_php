<?php
namespace base;

abstract class Controller
{
    protected $view;
    public function __construct()
    {
        $this->view = new View;
        $this->view->setLayout('main');
    }
    abstract public function actionIndex();
}