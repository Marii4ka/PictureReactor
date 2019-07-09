<?php

require_once 'class/Session.php';

class controller
{

    public $model;
    public $view;

    function __construct()
    {
        $this->view = new View();
        Session::init();
    }

    function action_index()
    {

    }
}