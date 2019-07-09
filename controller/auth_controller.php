<?php

class auth_controller extends controller
{
    public function __construct()
    {
        parent::__construct();
        $this->model = new auth_model();
    }

    public function action_index()
    {
        $this->view->generate('auth_view.php', 'template_view.php');
    }

    public function action_auth()
    {
        $this->model->run();
    }

    public function action_logout()
    {
        Session::abort();
        header("Location: http://localhost/pictures/main/index");
        exit;
    }
}