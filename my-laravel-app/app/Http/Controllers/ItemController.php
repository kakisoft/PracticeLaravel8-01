<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Item;
use App\Models\Artist;

class ItemController extends Controller
{
    private $item;

    public function __construct(Item $item)
    {
        $this->setInitialRecord();

        $this->item = $item->find(1);
    }

    private function setInitialRecord(){

        $item = Item::firstOrCreate([
            'name' => 'London to Paris',
            'sub_name' => 'LP'
        ]);
    }

    public function index() {

        if(is_null($this->item)){
            return null;
        }

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
