<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;

    //
    protected $fillable = ['title', 'body'];

    // public function comments() {
    //   return $this->hasMany('App\Models\Comment');
    // }
}
