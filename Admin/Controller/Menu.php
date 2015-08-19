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

        // Loop through all pages in the directory
        foreach (\Helper\Folder::listFiles(APP_ROOT . '/Data/Menus') as $file)
        {

            // Get the page name from filename
            $parts = explode('.', $file);

            // Get page information from xml file
            $this->data['menus'][$parts[0]] = \Helper\Xml::parseFile(APP_ROOT . '/Data/Menus/' . $file);

        }

    }

    protected function _edit()
    {
      
      // menu 
      $menu = 'menu-1';
      
      // Item
      $item = (!empty($this->data['get']['item'])) ? $this->data['get']['item'] : '';
      
      // Get menu items
      $items = \Helper\Xml::parseFile(APP_ROOT . '/Data/Menus/' . $menu . '.xml', true);

      // Get children
      $children = $items->items->children();

      // Loop through and find the one we want
      foreach ($children as $child) {

        if ((string) $child->title == $this->data['get']['item']) {
          $this->data[0] = (array) $child;
          break;
        }
        
      }

      // Include the view
      include (ADMIN_ROOT . '/Views/Menu/edit.php');

    }

    protected function _save()
    {

        if (\Helper\Xml::saveFile(APP_ROOT . '/Data/Menus/menu-1.xml', $this->data['post']['content']))
        {
          $message = "Menu saved";
        }
        else
        {
          $message = "Menu could not be saved";
        }

        header('Location: index.php?a=Menu/Edit&item=' . $this->data['get']['item'] . "&message=" . urlencode($message));

    }

}
