<?php

namespace Helper;

final class Data
{
    public static function add($file, $data)
    {

      // Try to create and save file data
      try {

        // Open file handler
        $fh = fopen($file, 'w');

        // Write the data to the file
        fwrite($fh, $data);

        // Close the file handler
        fclose($fh);
      } catch (Exception $e) {
        // Throw exception
        throw new Exception($e->errorMessage());
      }
    }

    public static function save($file, $data)
    {

      // Save the file data
      if (file_put_contents($file, $data))
      {
          // Return success
          return true;
      } else
      {
          // Throw exception if data could not be saved
          die('Data could not be saved');
          
      }
      
    }

    public static function get($file)
    {

      // If the file exists
      if (file_exists($file)) {
          // Get the data
          if ($data = file_get_contents($file)) {
              // Return the data
            return $data;
          } else {
              // Throw exception if data could not be saved
            die('Data could not be retrieved');
          }
      } else {
          // Throw exception if file does not exist
          die('File: '.$file.' does not exist');
      }
    }
}
