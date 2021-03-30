<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artist extends Model
{
    use HasFactory;

    // protected $guarded = ['id'];
    protected $fillable = ['name', 'sub_name', 'cover', 'category_id'];
    // protected $hidden = ['created_at', 'updated_at'];


}
