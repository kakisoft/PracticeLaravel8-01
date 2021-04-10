<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Artist extends Model
{
    use SoftDeletes;
    use HasFactory;

    const UNKNOWN_ID = 1;
    const UNKNOWN_NAME = 'Unknown Artist';
    const VARIOUS_ID = 2;
    const VARIOUS_NAME = 'Various Artists';

    // protected $guarded = ['id'];
    protected $fillable = ['name', 'sub_name', 'cover', 'category_id'];
    // protected $hidden = ['created_at', 'updated_at'];


}
