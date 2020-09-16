<?php
use library\Url;

//Автоподключение классов
spl_autoload_register(function ($className) {
    $className = str_replace('\\', '/', $className);
    try
    {
        if (file_exists('core/' . $className . '.class.php')) {
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
    $fileName = 'core/' . $controller . '.class.php';
    if (!file_exists($fileName)) {
        throw new library\HttpException('Page not found', 404);
    }

    $controller = new $controller;

    if (!method_exists($controller, $action)) {
        throw new Exception('Not found', 404);
    }
    $controller->$action();
} catch (library\HttpException $e) {
    header("HTML/1.1 $e->getCode() $e->getMessage()");
    exit('Page not found');
} catch (Exception $e) {
    die("$e->getMessage");
}
