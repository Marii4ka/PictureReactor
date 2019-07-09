<?php

class registr_controller extends controller
{
    public function __construct()
    {
        parent::__construct();
        $this->model = new registr_model();
    }

    public function action_index()
    {
        $this->view->generate('registr_view.php', 'template_view.php');
    }

    public function action_registration(){
        $userName = $_POST['user-name'];
        $userPassword = $_POST['user-password'];
        $userEmail = $_POST['user-email'];
        if ($this->model->check_user($userName, $userEmail) != 0){
            echo 'User already exists!';
        } else {
            $data = array(
              'user_name' => $userName,
                'password' => password_hash($userPassword, PASSWORD_DEFAULT),
                'email' => $userEmail
            );
            $this->model->insert_user($data);
        }
        Session::init();
        Session::set('role', 'user');
        Session::set('loggedIn', true);
        Session::set('userName', $userName);
        Session::set('password', $userPassword);

        header("Location: http://localhost/pictures/main/index");
    }



}