<?php

namespace Helper;

final class Xml
{

    public function __construct()
    {

    }

    public static function parseFile($file, $asXml = false)
    {
      
      try {
        $xmlObject = simplexml_load_file($file, null, LIBXML_NOCDATA);
        
        if ($asXml) {
          return $xmlObject;
        } else {
          return json_decode(json_encode((array) $xmlObject), 1);
        }
        
      } catch (Exception $e) {
        throw new Exception($e->errorMessage());
      }

    }

    public static function saveFile($readFile, $writeFile, $data)
    {

      // Load the data from the file into a variable
      $xmlData = simplexml_load_file($readFile, null, LIBXML_NOCDATA);

      // Loop through the data and update the xml
      foreach ($data as $key => $value)
      {

        // Update the value
        $xmlData->$key = $value;

      }

      // Save the new file
      return $xmlData->asXml($writeFile);

    }

}
