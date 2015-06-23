<?php

namespace Controller;

abstract class Controller
{

    public $data = array();

    public function __construct()
    {

        include (APP_ROOT . '/Templates/default/head.html');

    }

    public function __destruct()
    {

        include (APP_ROOT . '/Templates/default/footer.html');

    }

}