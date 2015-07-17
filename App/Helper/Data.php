<?php

namespace Helper;

final class Data
{

    public static function add($file, $data)
    {

      try
      {

        $fh = fopen($file, 'w');

        fwrite($fh, $data);

        fclose($fh);

      }
      catch (Exception $e)
      {
        throw new Exception($e->errorMessage());
      }

    }

    public static function save($file, $data)
    {

        if (file_exists($file))
        {
            if (file_put_contents($file, $data))
            {
              return true;
            }
            else
            {
              throw new Exception('Data could not be saved');
            }
        }
        else
        {
            throw new Exception('File: ' . $file . ' does not exist');
        }

    }

    public static function get($file)
    {

      if (file_exists($file))
      {
          if ($data = file_get_contents($file))
          {
            return $data;
          }
          else
          {
            throw new Exception('Data could not be retrieved');
          }
      }
      else
      {
          throw new Exception('File: ' . $file . ' does not exist');
      }

    }

}
