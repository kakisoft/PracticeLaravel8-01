<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    //// ホワイトリスト形式の入力制御
    protected $fillable = ['name', 'sub_name', 'cover', 'category_id'];

    //// ブラックリスト形式の入力制御
    // protected $guarded = ['id'];

    //// 自動キャスト
    // protected $casts = [
    //     'price' => 'boolean',
    // ];

}

