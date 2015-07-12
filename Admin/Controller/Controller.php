<?php

namespace Controller;

abstract class Controller
{

    public $data = array();

    public function __construct()
    {

        include (ADMIN_ROOT . '/Templates/default/head.html');

    }

    public function __destruct()
    {

        include (ADMIN_ROOT . '/Templates/default/footer.html');

    }

}
