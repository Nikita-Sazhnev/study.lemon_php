<?php
namespace controllers;

use library\Auth;
use library\Request;

class ControllerAdmin extends \base\Controller
{
    public $content;

    public function __construct()
    {
        parent::__construct();
        Auth::canAccess('admin');
        $this->content = new \library\Content;
        $this->view = new \base\View;
        $this->view->setLayout('admin');
    }

    public function actionIndex()
    {
        $this->view->setTitle('Admin Panel');
        $this->view->render('admin-home', []);
    }
    public function actionPopular()
    {
        if (Request::isPost() && isset(Request::getPost()['popular'])) {
            $model = new \models\UploadForm;
            $image = Request::getFiles();
            $model->uploadImage($image['file'], 'popular_now.png');
        }
        $this->view->setTitle('Popular Now');
        $this->view->render('popular', ['content' => $this->content]);
    }
    public function actionBig()
    {

        $this->view->setTitle('Single');
        $this->view->render('big', ['content' => $this->content]);
    }
    public function actionNav()
    {
        if (Request::isPost()) {
            $model = new \models\NavbarForm;
            $model->load(Request::getPost());
            $model->insert();
        }
        $this->view->setTitle('Nav');
        $this->view->render('nav', ['content' => $this->content]);
    }
    public function actionComments()
    {
        $this->view->setTitle('Comments');
        $this->view->render('admin-home', []);
    }
    public function actionLogo()
    {
        if (Request::isPost() && isset(Request::getPost()['logo'])) {
            $model = new \models\UploadForm;
            $image = Request::getFiles();
            $model->uploadImage($image['file'], 'Logo copy.png');
        }
        $this->view->setTitle('Main Logo');
        $this->view->render('logo', []);
    }
    public function actionPreview()
    {
        $this->view->setTitle('Preview');
        $this->view->render('admin-home', []);
    }
    public function actionChichi()
    {
        $this->view->setTitle('ChiChi');
        $this->view->render('admin-home', []);
    }
    public function actionAritcle()
    {
        $this->view->setTitle('Article');
        $this->view->render('admin-home', []);
    }
    public function actionAuthor()
    {
        $this->view->setTitle('Author');
        $this->view->render('admin-home', []);
    }
    public function actionSlider()
    {
        $this->view->setTitle('Slider');
        $this->view->render('admin-home', []);
    }
    public function actionTags()
    {
        $this->view->setTitle('Tags');
        $this->view->render('admin-home', []);
    }
}