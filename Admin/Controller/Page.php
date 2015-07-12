<?php

use \Helper\Xml, \Helper\File;

namespace Controller;

class Page extends Controller
{

    public function __construct($method = 'index')
    {

        // Load the parent class
        parent::__construct();

        // Run the specified method
        $this->$method();

    }

    protected function _index()
    {

        // Call the list method
        $this->_list();

        // Include the view
        include (ADMIN_ROOT . '/Views/Page/index.php');

    }

    protected function _list()
    {

        // Loop through all pages in the directory
        foreach (\Helper\Folder::listFiles(APP_ROOT . '/Data/Pages') as $file)
        {

            // Get the page name from filename
            $parts = explode('.', $file);

            // Get page information from xml file
            $this->data[$parts[0]] = \Helper\Xml::parseFile(APP_ROOT . '/Data/Pages/' . $file);

            // Get the content from the markdown file
            $this->data[$parts[0]]['content'] = file_get_contents(APP_ROOT . '/Data/Content/' . $parts[0] . '.md');

        }

    }

}
