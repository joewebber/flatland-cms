<?php

use \Helper\Xml, \Helper\File;

namespace Controller;

final class Template
{

    public function __construct($method = '_index')
    {

        $this->$method();

    }

    protected function _index()
    {

        include (APP_ROOT . '/Views/Template/index.php');

    }

}