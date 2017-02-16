<?php

namespace App\Models;

use Core\BaseModelEloquent;

class User extends BaseModelEloquent
{
    public $table = "users";

    public $timestamps = false;

    protected $fillable = ['name', 'email', 'password'];

    public function rulesCreate()
    {
        return [
            'name' => 'min:4|max:255',
            'email' => 'email|unique:User:email',
            'password' => 'min:6|max:16'
        ];
    }

    public function rulesUpdate($id)
    {
        return [
            'name' => 'min:4|max:255',
            'email' => "email|unique:User:email:$id",
            'password' => 'min:6|max:16'
        ];
    }

    public function post()
    {
        return $this->hasMany(Post::class);
    }

}