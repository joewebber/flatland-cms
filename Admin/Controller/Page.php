<?php

use \Helper\Xml, \Helper\File;

namespace Controller;

require_once($_SERVER['DOCUMENT_ROOT'] . '/../App/Controller/Controller.php');

class Page extends Controller
{

    public function __construct($method = 'index')
    {

        parent::__construct();

        $this->$method();

    }

    protected function _index()
    {

        $this->_list();

        include (ADMIN_ROOT . '/Views/Page/index.php');

    }

    protected function _list()
    {

        foreach (\Helper\Folder::listFiles(APP_ROOT . '/Data/Pages') as $file)
        {

            $this->data[] = \Helper\Xml::parseFile(APP_ROOT . '/Data/Pages/' . $file);

        }

    }

}
