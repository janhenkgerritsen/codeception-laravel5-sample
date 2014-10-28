<?php namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Post extends Eloquent {

    protected $fillable = ['title', 'body'];
    protected $hidden = ['created_at', 'updated_at'];

} 