<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Models\Item;

class ItemsController extends Controller
{
    private $item;

    public function __construct(Item $item)
    {
        $this->item = $item->find(1);
    }

    public function index() {
        $data = $this->item->toArray();

dump($data['id']);

        return response($data['name'], Response::HTTP_OK);
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
