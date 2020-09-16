<?php
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
