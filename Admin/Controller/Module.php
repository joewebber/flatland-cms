<?php

use \Helper\Xml, \Helper\File, \Helper\Data;

namespace Controller;

class Module extends Controller
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
        include (ADMIN_ROOT . '/Views/Module/index.php');

    }

    protected function _list()
    {

        // Loop through all modules in the directory
        foreach (\Helper\Folder::listFiles(APP_ROOT . '/Data/Modules') as $file)
        {
          
            // Get the module name from filename
            $parts = explode('.', $file);
            
            // Exclude blank
            if ($file == 'blank.xml')
            {
              continue;
            }

            // Get module information from xml file
            $this->data['modules'][$parts[0]] = \Helper\Xml::parseFile(APP_ROOT . '/Data/Modules/' . strtolower($file));

        }

    }

    protected function _edit()
    {

      $file = $this->data['get']['title'];

      // Get module information from xml file
      $this->data[0] = (!empty($file)) ? \Helper\Xml::parseFile(APP_ROOT . '/Data/Modules/' . strtolower($file) . '.xml') : '';

      // Include the view
      include (ADMIN_ROOT . '/Views/Module/edit.php');

    }

    protected function _save()
    {
        
        // Set the filename
        $file = strtolower($this->data['post']['title']);

        // Set file to get data from
        $readFile = (file_exists(APP_ROOT . '/Data/Modules/' . $file . '.xml')) ? APP_ROOT . '/Data/Modules/' . $file . '.xml' : APP_ROOT . '/Data/Modules/blank.xml';

        // Save page data
        \Helper\Xml::saveFile($readFile, APP_ROOT . '/Data/Modules/' . $file . '.xml', array('title' => $this->data['post']['title'], 'content' => $this->data['post']['content']));

        // Redirect and show message
        header('Location: index.php?a=Module/Edit&title=' . $this->data['post']['title'] . "&message=" . urlencode("Module Saved"));

    }

}
