<?php

namespace App\Models;

use Core\BaseModel;

class Post extends BaseModel
{
    protected $table = "posts";

    public function rules()
    {
        return [
            'title' => 'min:5|max:255',
            'content' => 'min:10'
        ];
    }

}