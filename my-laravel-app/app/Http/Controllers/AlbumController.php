<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\AlbumService;

class AlbumController extends Controller
{
    private $albumService;

    public function __construct(
        AlbumService $albumService
    ) {
        $this->albumService = $albumService;
    }

    public function index() {

        $myPlaylist = $this->albumService->executeSomething(1);

        // dd($myPlaylist);

dump("aaa");
        return;
    }

    //
}
