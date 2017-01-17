<?php
/**
 * Created by PhpStorm.
 * User: gazel
 * Date: 17/01/17
 * Time: 18:01
 */

namespace Core;


class Container
{
    public static function newController($contoller)
    {
        $objContoller = "App\\Controllers\\" . $contoller;
        return new $objContoller;
    }

}