<?php
namespace controllers;

use base\Controller;
use library\Auth;
use library\Request;
use library\Search;
use library\Validator;

class ControllerMain extends Controller
{
    public function actionIndex()
    {
        if (!Auth::isGuest()) {
            $model = new \models\CommentForm;
            if (Request::isPost()) {
                $model->load(Request::getPost());
                $model->postComment();
            }
        }

        $this->view->setTitle('Lemon');
        $this->view->render('home', []);
    }
    public function actionLogin()
    {

        if (Auth::isGuest()) {
            $model = new \models\LoginForm();
            if (Request::isPost()) {
                $model->load(Request::getPost());
                if ($model->doLogin()) {
                    header("Location: /");
                } else {
                    echo 'Wrong login or password';
                }
            }

            $this->view->setTitle('login');
            $this->view->render('login', []);
        } else {
            throw new \Exception("Forbiden", 403);
        }
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
                $model->load(Request::getPost());
                if (Validator::unique('email', $_POST['email']) && Validator::unique('login', $_POST['login'])) {
                    if (Validator::confirm($_POST['password'], $_POST['password_confirm'])) {
                        $model->doRegister();
                        header("Location: /");
                    } else {
                        echo 'Пароли не совпадают';
                    }
                } else {
                    echo 'Пользователь с таким данными уже сущестюует';
                }
            }
            $this->view->setTitle('Registration');
            $this->view->render('reg', ['model' => $model]);
        } else {
            throw new \Exception("Forbiden", 403);
        }

    }
    public function actionSearch()
    {
        if (!Request::isSearchEmpty()) {
            $respond = Search::doSearch(Request::getSearch());
            if (empty($respond)) {
                $this->view->setMessage("Нет подходящих резульататов поиска");
            }
        } else {
            $this->view->setMessage('Введите поисковый запрос');
        }
        $this->view->setTitle('Search');
        $this->view->render('search', ['search' => $respond]);
    }
}