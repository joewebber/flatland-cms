<?php

spl_autoload_register('flatland_autoloader');

function flatland_autoloader($className)
{
    $path = '../app/controllers';

    if (file_exists($path . '/' . $className . '.php'))
    {
        include $path . '/' . $className . '.php';
    }

}

//-------------------------------------

$generator = new \Flatland\Generator;