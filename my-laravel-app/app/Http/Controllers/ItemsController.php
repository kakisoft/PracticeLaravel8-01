<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ItemsController extends Controller
{
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
