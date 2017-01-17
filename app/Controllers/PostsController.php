<?php

namespace App\Controllers;


class PostsController
{
    public function index(){
        echo "Posts";
    }

    public function show($id){
        echo $id;
    }

}