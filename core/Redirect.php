<?php

namespace Core;


class Redirect
{
    public static function route($url, $with = [])
    {
        if (count($with) > 0)
            foreach ($with as $key => $value)
                Session::set($key, $value);
        return header("location:$url");
    }
}