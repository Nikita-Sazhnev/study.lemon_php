<?php
session_start();

use library\Url;

//Проверка сущесвования файла
function checkFile($fileName)
{
    $fileName = 'core/' . str_replace('\\', '/', $fileName) . '.class.php';
    return file_exists($fileName);
}
//Автоподключение классов
spl_autoload_register(function ($className) {
    try
    {
        if (checkFile($className)) {
            require_once ('core/' . $className . '.class.php');
            return true;
        }
        throw new Exception($className, 1);
    } catch (Exception $e) {
        echo "<br />" . 'Codnt find class: ' . $e->getMessage();
        exit();
    }
});

//Роутинг
$controllerName = Url::getSegmentByNumber(0);
$actionName = Url::getSegmentByNumber(1);

if (is_null($controllerName)) {
    $controller = 'controllers\ControllerMain';
} else {
    $controller = 'controllers\Controller' . ucfirst($controllerName);
}

if (is_null($actionName)) {
    $action = 'actionIndex';
} else {
    $action = 'action' . ucfirst($actionName);
}

// Проверка существования Controler и Action
try {
    if (!checkFile($controller)) {
        throw new Exception('Controller Not Found', 404);
    }

    $controller = new $controller;

    if (!method_exists($controller, $action)) {
        throw new Exception('Action Not Found', 404);
    }
    $controller->$action();
} catch (Exception $e) {
    header("HTTP/1.1 " . $e->getCode() . " " . $e->getMessage());
    exit($e->getMessage());
}