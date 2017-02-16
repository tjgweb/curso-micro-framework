<?php

namespace App\Models;

use Core\BaseModelEloquent;

class Post extends BaseModelEloquent
{
    public $table = "posts";

    public $timestamps = false;

    protected $fillable = ['title', 'content'];

    public function rules()
    {
        return [
            'title' => 'min:5|max:255',
            'content' => 'min:10'
        ];
    }
}