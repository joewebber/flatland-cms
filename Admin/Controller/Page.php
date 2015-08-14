<?php

use \Helper\Xml, \Helper\File, \Helper\Data;

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
            $this->data['pages'][$parts[0]] = \Helper\Xml::parseFile(APP_ROOT . '/Data/Pages/' . $file);

            // Get the content from the markdown file
            $this->data['pages'][$parts[0]]['content'] = \Helper\Data::get(APP_ROOT . '/Data/Content/' . $parts[0] . '.md');

        }

    }

    protected function _edit()
    {

      $file = $this->data['get']['title'];

      // Get page information from xml file
      $this->data[0] = (!empty($file)) ? \Helper\Xml::parseFile(APP_ROOT . '/Data/Pages/' . $file . '.xml') : '';

      // Get the content from the markdown file
      $this->data[0]['content'] = (!empty($file)) ? \Helper\Data::get(APP_ROOT . '/Data/Content/' . $file . '.md') : '';

      // Include the view
      include (ADMIN_ROOT . '/Views/Page/edit.php');

    }

    protected function _save()
    {

        // Save page data
        \Helper\Xml::saveFile(APP_ROOT . '/Data/Pages/' . $this->data['post']['title'] . '.xml', array('title' => $this->data['post']['title'], 'head-page-title' => $this->data['post']['head-page-title'], 'head-meta-description' => $this->data['post']['head-meta-description'], 'filename' => $this->data['post']['title'] . '.xml'));

        // Save page content
        \Helper\Data::save(APP_ROOT . '/Data/Content/' . $this->data['get']['title'] . '.md', $this->data['post']['content']);

        // Redirect and show message
        header('Location: index.php?a=Page/Edit&title=' . $this->data['get']['title'] . "&message=" . urlencode($message));

    }

}
