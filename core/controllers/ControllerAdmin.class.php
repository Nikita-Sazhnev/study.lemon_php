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
            $model::uploadImage($image['file'], 'popular_now.png');
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
        $this->view->setTitle('Nav');
        if (Request::isIdEmpty()) {
            $this->view->render('nav', ['content' => $this->content]);
        } else {
            if (Request::isPost() && isset(Request::getPost()['edit'])) {
                $model = new \models\NavbarForm;
                $model->load(Request::getPost());
                $model->update();
            }
            $this->view->render('nav-edition', ['content' => $this->content]);
        }
    }

    public function actionComments()
    {

        $this->view->setTitle('Comments');
        if (Request::isIdEmpty()) {
            $this->view->render('comments', ['content' => $this->content]);
        } else {
            if (Request::isPost() && isset(Request::getPost()['edit'])) {
                $model = new \models\CommentForm;
                $model->load(Request::getPost());
                $model->update();
            }
            $this->view->render('comment-edition', ['content' => $this->content]);
        }
    }

    public function actionLogo()
    {
        if (Request::isPost() && isset(Request::getPost()['logo'])) {
            $model = new \models\UploadForm;
            $image = Request::getFiles();
            $model::uploadImage($image['file'], 'Logo copy.png');
        }
        $this->view->setTitle('Main Logo');
        $this->view->render('logo', []);
    }
    public function actionPreviews()
    {
        $model = new \models\PreviewForm;
        if (Request::isPost() && isset(Request::getPost()['new'])) {

            $model->load(Request::getPost());
            $model->insert();
        }
        $this->view->setTitle('Previews');
        if (Request::isIdEmpty()) {
            $this->view->render('previews', ['content' => $this->content]);
        } else {
            if (Request::isPost() && isset(Request::getPost()['edit'])) {
                $model->load(Request::getPost());
                $model->update();
            }
            $this->view->render('preview-edition', ['content' => $this->content]);
        }
    }
    public function actionChichi()
    {
        $this->view->setTitle('ChiChi');
        $this->view->render('chichi', ['content' => $this->content]);
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
        if (Request::isPost() && isset(Request::getPost()['new'])) {
            $model = new \models\TagsForm;
            $model->load(Request::getPost());
            $model->insert();
        }
        $this->view->setTitle('Tags');
        if (Request::isIdEmpty()) {
            $this->view->render('tags', ['content' => $this->content]);
        } else {
            if (Request::isPost() && isset(Request::getPost()['edit'])) {
                $model = new \models\TagsForm;
                $model->load(Request::getPost());
                $model->update();
            }
            $this->view->render('tag-edition', ['content' => $this->content]);
        }
    }
}