<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Item;
use App\Models\Artist;

/**
 * 実験的なコードを色々書いては消していってるだけなので、
 * 挙動の詳細を追ったりしないでね。
 */
class ItemController extends Controller
{
    private $item;
    private $model;

    public function __construct(Item $item)
    {
        $this->setInitialRecord();

        $this->item = $item->find(1);
    }

    /**
     *
     *
     * @return
     */
    private function setInitialRecord(){

        $item = Item::firstOrCreate([
            'name' => 'London to Paris',
            'sub_name' => 'LP'
        ]);
    }

    /**
     *
     *
     * @return
     */
    public function index() {

        if(is_null($this->item)){
            return null;
        }

        $data = $this->item->toArray();

dump($data['id']);

        return response($data['name'], Response::HTTP_OK);
    }

    /**
     *
     *
     * @return
     */
    public function executeSampleQuery01() {

        $this->model = app()->make(Item::class);

        $query = $this->model->query();
        $query->select(
            'id',
            'price',
            'name'
        );
        // $query->where('owner_id', '=', $shipperId);
        // $query->where('name1', 'like', '%' . $params['name'] . '%');
        // $query->orderBy('code', 'asc');
        // $query->paginate($limit);

        $query->paginate(5);

        $record01  = $query->get();
        $record02  = $query->get()->toArray();

echo "<pre>=====================<br>";
var_dump($record02);
echo "<br>=====================</pre>";

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
