<?php
namespace controllers;

use base\Controller;
use library\Db;

class ControllerMain extends Controller
{
    public function actionIndex()
    {
        $db = Db::getDb();
        var_dump($db);
    }
}
