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

        //==========< firstOrCreate ：該当のレコードが無ければ作成 >==========
        $item1 = Item::firstOrCreate([
            'name' => 'London to Paris',
            'sub_name' => 'LP'
        ]);

        $item2 = Item::firstOrCreate(
            ['name' => 'London to Paris2'],
            ['sub_name' => 'LP2']
        );

        if ($item2->wasRecentlyCreated) {
            // This is a new Item
        }
        else{
            // This Item was found in the database
        }

        //==========< firstOrNew は、インスタンスの作成のみ >==========
        $id = 3;
        $item3 = Item::query()->where('id', '=', $id)->firstOrNew([
            'name' => 'name3',
            'sub_name' => 'sub_name3'
        ]);

        // save でレコード作成
        $item3->save();

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
