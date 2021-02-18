<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'body',
    ];


    // set up relationship that a post belongs to a user so that we can access user info from post model
    public function user(){

        return $this->belongsTo(User::class);
    }
}
