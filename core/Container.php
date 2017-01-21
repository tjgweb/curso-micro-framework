<?php

namespace Core;


class Container
{
    public static function newController($contoller)
    {
        $objContoller = "App\\Controllers\\" . $contoller;
        return new $objContoller;
    }



    public static function pageNotFound()
    {
        if(file_exists(__DIR__ . "/../app/Views/404.phtml")){
            return require_once __DIR__ . "/../app/Views/404.phtml";
        }else{
            echo "Erro 404: Page not found!";
        }
    }

}