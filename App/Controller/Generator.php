<?php

use \Helper\Xml, \Helper\File;

namespace Controller;

final class Generator
{

    protected $_menus = array();

    protected $_pages = array();

    protected $_modules = array();

    public function __construct()
    {

        $this->_getMenus();

        $this->_getPages();

        $this->_getModules();

        $this->_writePages();

    }

    protected function _writePages()
    {

        foreach ($this->_pages as $page)
        {

            $data = $this->_renderElement('head',
                array(
                    'head-page-title' => $this->_getPageTitle($page),
                    'head-meta-description' => $this->_getPageMetaDescription($page)
                )
            );

            $replacements = array('content' => $this->_getPageContent($page));

            foreach ($this->_menus as $key => $menuItems)
            {

                $replacements[$key] = '<ul>';

                foreach ($menuItems as $_menuItem)
                {

                    $replacements[$key] .= '<li><a href ="' . $_menuItem['slug'] . '">' . $_menuItem['title'] . '</a></li>';

                }

                $replacements[$key] .= '</ul>';

            }

            foreach ($this->_modules as $key => $_module)
            {

                $replacements['module-' . $key] = $_module['content'];

            }

            $data .= $this->_renderElement('body', $replacements);

            if (!file_exists(WEB_ROOT . '/' . $page['filename']))
            {

                $fh = fopen(WEB_ROOT . '/' . $page['filename'], 'w');

                fwrite($fh, $data);

                fclose($fh);

            }
            else
            {

                file_put_contents(WEB_ROOT . '/' . $page['filename'], $data);

            }

        }

    }

    protected function _getMenus()
    {

        foreach (\Helper\Folder::listFiles(APP_ROOT . '/Data/Menus') as $file)
        {

            $data = \Helper\Xml::parseFile(APP_ROOT . '/Data/Menus/' . $file);

            $this->_menus[pathinfo($file, PATHINFO_FILENAME)] = $data['item'];

        }

    }

    protected function _getPages()
    {

        foreach (\Helper\Folder::listFiles(APP_ROOT . '/Data/Pages') as $file)
        {

            $data = \Helper\Xml::parseFile(APP_ROOT . '/Data/Pages/' . $file);

            $this->_pages[pathinfo($file, PATHINFO_FILENAME)] = $data;

        }

    }

    protected function _getModules()
    {

        foreach (\Helper\Folder::listFiles(APP_ROOT . '/Data/Modules') as $file)
        {

            $data = \Helper\Xml::parseFile(APP_ROOT . '/Data/Modules/' . $file);

            $this->_modules[pathinfo($file, PATHINFO_FILENAME)] = $data;

        }

    }

    protected function _getPageTitle($data = array())
    {

        return $data['head-page-title'];

    }

    protected function _getPageContent($data = array())
    {

        return $data['content'];

    }

    protected function _getPageMetaDescription($data = array())
    {

        return $data['head-meta-description'];

    }

    protected function _renderElement($element = NULL, $replacements = array())
    {

        if ($element)
        {

            $data = file_get_contents(APP_ROOT . '/Data/Template/' . $element . '.html');

            foreach ($replacements as $key => $val)
            {

                $data = str_replace('{' . $key . '}', $val, $data);

                $data = str_replace("\n", '', $data);

            }

            return $data;

        }

    }

}