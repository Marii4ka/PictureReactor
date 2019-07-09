<?php


class main_model extends model
{
    public function get_posts()
    {
        return Database::query("SELECT * FROM posts");
    }

    public function get_comments(){
        return Database::query("SELECT * FROM comments");
    }

    public function get_users(){
        return Database::query("SELECT * FROM users");
    }

    public function get_user_id($userName){
        $data = Database::query("SELECT * FROM users WHERE `user_name` = '$userName'");
        if (!empty($data)){
            return $data[0]['user_id'];
        }
    }
}