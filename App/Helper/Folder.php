<?php

namespace Helper;

final class Folder
{

    protected $_folder;

    public function __construct($folder)
    {

        $this->_folder = $folder;

    }

    public static function listFiles($folder = NULL)
    {

        if ($folder)
        {

            return array_diff(scandir($folder), array('..', '.', '.DS_Store'));

        }
        else
        {

            //throw new Exception('No folder specified');

        }

    }

}