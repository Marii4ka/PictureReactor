<?php


class registr_model extends model
{
    public function check_user($userName, $userEmail){
        $data = Database::query("SELECT * FROM users where `user_name` = '$userName' AND `email` = '$userEmail'");
        $count = count($data);
        return $count;
    }

    public function insert_user($data){
        $this->insert('registr', $data);
    }
}