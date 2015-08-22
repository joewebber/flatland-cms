<?php

use \Helper\Xml, \Helper\File, \Helper\Data;

namespace Controller;

class Menu extends Controller
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
        include (ADMIN_ROOT . '/Views/Menu/index.php');

    }

    protected function _list()
    {

        // Loop through all folder in the directory
        foreach (\Helper\Folder::listFiles(APP_ROOT . '/Data/Menus') as $folder)
        {
          
          if (!is_dir(APP_ROOT . '/Data/Menus/' . $folder)) {
            continue;
          }
          
          $this->data['menus'][$folder] = array();
          
          // Loop through files  
          foreach (\Helper\Folder::listFiles(APP_ROOT . '/Data/Menus/' . $folder) as $file)
          {
            
            $parts = explode('.', $file);
            
            // Get page information from xml file
            $this->data['menus'][$folder][] = \Helper\Xml::parseFile(APP_ROOT . '/Data/Menus/' . $folder . '/' . $file);
            
          }

        }

    }

    protected function _edit()
    {
      
      $file = (!empty($this->data['get']['menuItem'])) ? $this->data['get']['menuItem'] : '';
      
      // Get menu item data
      $this->data[0] = (!empty($file)) ? \Helper\Xml::parseFile(APP_ROOT . '/Data/Menus/' . $this->data['get']['menu'] . '/' . $file) : '';

      // Include the view
      include (ADMIN_ROOT . '/Views/Menu/edit.php');

    }

    protected function _save()
    {
      
      // Set the folder
      $folder = $this->data['get']['folder'];
      
      // Set the filename
      $file = strtolower($this->data['post']['title']);

      // Set file to get data from
      $readFile = (file_exists(APP_ROOT . '/Data/Menus/' . $folder . '/' . $file . '.xml')) ? APP_ROOT . '/Data/Menus/' . $folder . '/' . $file . '.xml' : APP_ROOT . '/Data/Menus/blank.xml';

      // Save menu data
      if (\Helper\Xml::saveFile($readFile, APP_ROOT . '/Data/Menus/' . $folder . '/' . $file . '.xml', array('title' => $this->data['post']['title'], 'slug' => $this->data['post']['slug'], 'index' => $this->data['post']['index'], 'parent' => $this->data['post']['parent'], 'page' => $this->data['post']['page']))) {
          
          $message = "Menu item saved";
          
      } else {
      
          $message = "Menu item could not be saved";
        
      }

      header('Location: index.php?a=Menu/Edit&menuItem=' . $file . '.xml&menu=' . $this->data['get']['folder'] . '&message=' . urlencode($message));

    }

}
