<?php

define('APP_FOLDER', 'App');

define('ADMIN_FOLDER', 'Admin');

define('APP_ROOT', realpath(__DIR__) . '/../../' . APP_FOLDER);

define('ADMIN_ROOT', realpath(__DIR__) . '/../../' . ADMIN_FOLDER);

require(APP_ROOT . '/Config/defines.php');

spl_autoload_register('flatland_autoloader');

function flatland_autoloader($className)
{

    $parts = explode('\\', $className);

    $path = current($parts);

    if (file_exists($filePath = ADMIN_ROOT . '/' . str_replace('Admin', '', $path) . '/' . end($parts) . '.php') || file_exists($filePath = APP_ROOT . '/' . str_replace('Admin', '', $path) . '/' . end($parts) . '.php'))
    {
        include $filePath;
    }
    else
    {
        throw new Exception('Could not load class file : ' . $filePath);
    }

}

$_GET['a'] = (!isset($_GET['a'])) ? 'page' : $_GET['a'];

// Set the action to the one provided if available
if (isset($_GET['a']) && '' != $action = ltrim(rtrim($_GET['a'], '/'), '_'))
{
    $action = explode('/', $action);

    $controller = '\Controller\\' . str_replace(' ', '', ucwords(str_replace('', ' ', strtolower(array_shift($action)))));

}

$action[0] = empty($action[0]) ? 'index' : $action[0];

// Instantiate the controller
$c = new $controller('_' . $action[0]);
