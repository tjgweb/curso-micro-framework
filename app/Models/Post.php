<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
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