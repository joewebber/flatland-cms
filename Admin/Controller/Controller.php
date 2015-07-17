<?php

namespace Controller;

abstract class Controller
{

    public $data = array();

    public function __construct()
    {

        $this->data['get'] = $_GET;
        $this->data['post'] = $_POST;

        unset($this->data['get']['a']);

        if (isset($_GET['message'])) {
          $message = $_GET['message'];
        }

        include (ADMIN_ROOT . '/Templates/default/head.php');

    }

    public function __destruct()
    {

        include (ADMIN_ROOT . '/Templates/default/footer.php');

    }

}
