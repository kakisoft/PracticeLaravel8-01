<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Models\Item;

class ItemsController extends Controller
{
    //// 【 コントロールにおける、コンストラクタの引数 】
    // 特に特別は工夫は不要みたい。Laravel の DIがいい感じにやってくれるっぽい。
    public function __construct(Item $item)
    {
        $a1 = $item->find(1);
dd($a1);

dd("__construct");
    }

    public function index() {

dd("ItemsController.index");

        return;
    }

    /**
     * INSERT or UPDATE
     * 
     * @return 
     */
    public function store(Request $request, Post $post) {
        return redirect()->back();
    }

    /**
     * DELETE
     */
    public function destroy(Post $post, Comment $comment) {
        // $comment->delete();
        return redirect()->back();
    }

}
