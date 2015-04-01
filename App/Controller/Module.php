<?php

use \Helper\Xml, \Helper\File;

namespace Controller;

final class Module
{

    public function __construct($method = '_index')
    {

        $this->$method();

    }

    protected function _index()
    {

        include (APP_ROOT . '/Views/Module/index.php');

    }

}