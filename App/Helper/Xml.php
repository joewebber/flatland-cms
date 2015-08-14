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
            throw new Exception('Unable to read XML file: ' . $file);
        }

    }

    public static function saveFile($file, $data)
    {

      // Load the data from the file into a variable
      if (file_exists($file))
      {
        $xmlData = simplexml_load_file($file, null, LIBXML_NOCDATA);
      }
      else
      {
        $xmlData = simplexml_load_file('', null, LIBXML_NOCDATA);
      }

      // Loop through the data and update the xml
      foreach ($data as $key => $value)
      {

        // Update the value
        $xmlData->$key = $value;

      }

      // Save the new file
      $xmlData->asXml($file);

    }

}
