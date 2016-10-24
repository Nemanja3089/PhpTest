<?php
class User extends Master
{
    public static $table    = "users";
    public static $table_id = "user_id";

    public static function allUsers()
    {
        return parent::allUsers();
    }
}
