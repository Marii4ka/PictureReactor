<?php

require_once 'class/Database.php';
require_once 'class/Session.php';

class Model
{
    public function insert($type, $data)
    {
        switch ($type) {
            case 'main':
                $user_id = $data['user_id'];
                $image = $data['image'];
                echo "INSERT INTO posts (`image`, `user_id`) VALUES ($image, $user_id)";
                Database::query("INSERT INTO posts (`image`, `user_id`) VALUES ($image, $user_id)");
                break;
            case 'registr':
                $user_name = $data['user_name'];
                $password = $data['password'];
                $email = $data['email'];
                Database::query("INSERT INTO users (`user_name`, `password`, `email`) VALUES ('$user_name', '$password', '$email')");
                break;
        }
    }

    public function get($type, $data)
    {
        $table = null;
        $userName = $data['user-name'];

        switch ($type) {
            case 'main':
                $table = 'posts';
                break;
            case 'auth':
                $table = 'users';
                break;
            case 'registr':
                $table = 'users';
                break;
            default:
                echo 'Something is wrong';
                return;
        }

        $data = Database::query("SELECT * FROM $table where `user_name` = '$userName'");
        return $data;
    }

}