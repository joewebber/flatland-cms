<?php

namespace Helper;

final class Xml
{

    public function __construct()
    {

    }

    public static function parseFile($file)
    {

        if ($xmlObject = simplexml_load_file($file, null, LIBXML_NOCDATA))
        {
            return json_decode(json_encode((array) $xmlObject), 1);
        }
        else
        {
            //throw new Exception('Unable to read XML file: ' . $file);
        }

    }

}