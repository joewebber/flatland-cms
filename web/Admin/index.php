<?php

define('APP_FOLDER', 'App');

define('APP_ROOT', realpath(__DIR__) . '/../../' . APP_FOLDER);

require(APP_ROOT . '/Config/defines.php');

spl_autoload_register('flatland_autoloader');

function flatland_autoloader($className)
{

    $parts = explode('\\', $className);

    $path = '../../' . APP_FOLDER . '/' . current($parts);

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

$_GET['a'] = (!isset($_GET['a'])) ? 'user' : $_GET['a'];

// Set the action to the one provided if available
if (isset($_GET['a']) && '' != $action = ltrim(rtrim($_GET['a'], '/'), '_'))
{
    $action = explode('/', $action);

    $controller = '\Controller\\' . str_replace(' ', '', ucwords(str_replace('-', ' ', strtolower(array_shift($action)))));

}

$action[0] = empty($action[0]) ? 'index' : $action[0];

// Instantiate the controller
$c = new $controller('_' . $action[0]);