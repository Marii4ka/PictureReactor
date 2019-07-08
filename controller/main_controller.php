<?php
class main_controller extends controller{

    function __construct()
    {
        $this->model = new main_model();
        $this->view = new View();
    }

    function action_index()
    {
        $data = $this->model->get_data();
        $this->view->generate('main_view.php', 'template_view.php', $data);
    }
}