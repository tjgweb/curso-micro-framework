<?php

namespace Core;


class Redirect
{
    public static function route($url)
    {
        return header("location:$url");
    }
}