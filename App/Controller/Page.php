<?php

use \Helper\Xml, \Helper\File;

namespace Controller;

final class Page extends Controller
{

    public function __construct($method = 'index')
    {

        parent::__construct();

        $this->$method();

    }

    protected function _index()
    {

        $this->_list();

        include (APP_ROOT . '/Views/Page/index.php');

    }

    protected function _list()
    {

        foreach (\Helper\Folder::listFiles(APP_ROOT . '/Data/Pages') as $file)
        {

            $this->data[] = \Helper\Xml::parseFile(APP_ROOT . '/Data/Pages/' . $file);

        }

    }

}