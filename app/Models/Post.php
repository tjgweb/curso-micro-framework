<?php

namespace App\Models;

use Core\BaseModelEloquent;

class Post extends BaseModelEloquent
{
    public $table = "posts";

    public $timestamps = false;

    protected $fillable = ['user_id', 'title', 'content'];

    public function rules()
    {
        return [
            'title' => 'min:5|max:255',
            'content' => 'min:10'
        ];
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsToMany(Category::class);
    }
}