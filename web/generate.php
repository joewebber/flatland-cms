<?php

define('APP_FOLDER', 'App');

define('APP_ROOT', realpath(__DIR__) . '/../' . APP_FOLDER);

require(APP_ROOT . '/Config/defines.php');

spl_autoload_register('flatland_autoloader');

function flatland_autoloader($className)
{

    $parts = explode('\\', $className);

    $path = '../' . APP_FOLDER . '/' . current($parts);

    if (file_exists($filePath = $path . '/' . end($parts) . '.php'))
    {
        include $filePath;
    }
    else
    {
        throw new Exception('Could not load class file : ' . $filePath);
    }

}

//-------------------------------------

use \Controller;

$generator = new \Controller\Generator;