<?php


class main_model extends model
{
    public function get_data()
    {
        return Database::query("SELECT * FROM pictures");
    }
}