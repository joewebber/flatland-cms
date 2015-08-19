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
      try {
        return file_put_contents($file, $data);
      } catch (Exception $e) {
          throw new Exception($e->errorMessage());
      }
      
    }

    public static function get($file)
    {

      // If the file exists
      if (file_exists($file)) {
          // Get the data
          try {
            // Return the data
            return file_get_contents($file);
          } catch (Exception $e) {
              throw new Exception($e->errorMessage());
          }
      } else {
          // Throw exception if file does not exist
          die('File: '.$file.' does not exist');
      }
    }
}
