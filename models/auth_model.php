<?php


class auth_model extends model
{

    public function run()
    {
        $userName = $_POST['user-name'];
        $userPassword = $_POST['user-password'];
        $data = array(
            'user-name' => $userName,
            'user-password' => $userPassword
        );

        $data = $this->get('auth', $data);

        if (count($data) != 0) {
            if (($data[0]['user_name'] == $userName) && (password_verify($userPassword, $data[0]['password']))) {
                Session::init();
                Session::set('role', 'user');
                Session::set('loggedIn', true);
                Session::set('userName', $userName);
                Session::set('password', $data[0]['password']);
                header('location: ' . 'http://localhost/pictures/main/index');
            } else {
                Session::set('loggedIn', false);
                header('location: index');
            }
        } else {
            header('location: index');
            echo 'Try again pls';
        }
    }

}