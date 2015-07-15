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

        include (ADMIN_ROOT . '/Templates/default/head.html');

    }

    public function __destruct()
    {

        include (ADMIN_ROOT . '/Templates/default/footer.html');

    }

}
