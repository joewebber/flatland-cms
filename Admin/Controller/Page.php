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
            
            // Exclude blank
            if ($file == 'blank.xml')
            {
              continue;
            }

            // Get page information from xml file
            $this->data['pages'][$parts[0]] = \Helper\Xml::parseFile(APP_ROOT . '/Data/Pages/' . strtolower($file));

            // Get the content from the markdown file
            $this->data['pages'][$parts[0]]['content'] = \Helper\Data::get(APP_ROOT . '/Data/Content/' . strtolower($parts[0]) . '.md');

        }

    }

    protected function _edit()
    {

      $file = $this->data['get']['title'];

      // Get page information from xml file
      $this->data[0] = (!empty($file)) ? \Helper\Xml::parseFile(APP_ROOT . '/Data/Pages/' . strtolower($file) . '.xml') : '';

      // Get the content from the markdown file
      $this->data[0]['content'] = (!empty($file)) ? \Helper\Data::get(APP_ROOT . '/Data/Content/' . strtolower($file) . '.md') : '';

      // Include the view
      include (ADMIN_ROOT . '/Views/Page/edit.php');

    }

    protected function _save()
    {
        
        // Set the filename
        $file = strtolower($this->data['post']['title']);

        // Set file to get data from
        $readFile = (file_exists(APP_ROOT . '/Data/Pages/' . $file . '.xml')) ? APP_ROOT . '/Data/Pages/' . $file . '.xml' : APP_ROOT . '/Data/Pages/blank.xml';

        // Save page data
        \Helper\Xml::saveFile($readFile, APP_ROOT . '/Data/Pages/' . $file . '.xml', array('title' => $this->data['post']['title'], 'head-page-title' => $this->data['post']['head-page-title'], 'head-meta-description' => $this->data['post']['head-meta-description'], 'filename' => $this->data['post']['title'] . '.xml'));

        // Save page content
        \Helper\Data::save(APP_ROOT . '/Data/Content/' . $file . '.md', $this->data['post']['content']);

        // Redirect and show message
        header('Location: index.php?a=Page/Edit&title=' . $this->data['post']['title'] . "&message=" . urlencode("Page Saved"));

    }

}
