<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    // We have post and it belongsTo a user

    public function user(){
        return $this->belongsTo(User::class);
    }

    // We have a post and it belongsTo a category 

    public function category(){
        return $this->belongsTo(Category::class);
    }


    public function comments()

    {
        return $this->hasMany(Comment::class);

    }
    public function likes()

    {
        return $this->hasMany(Like::class);

    }
}
