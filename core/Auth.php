<?php

namespace Core;


class Auth
{
    private static $id = null;
    private static $name = null;
    private static $email = null;

    public function __construct()
    {
        if(Session::get('user')){
            $user = Session::get('user');
            self::$id = $user['id'];
            self::$name = $user['name'];
            self::$email = $user['email'];
        }
    }

    public static function id()
    {
        return self::$id;
    }

    public static function name()
    {
        return self::$name;
    }

    public static function email()
    {
        return self::$email;
    }

    public static function check()
    {
        if(self::$id == null || self::$name == null || self::$email == null)
            return false;
        return true;
    }
}