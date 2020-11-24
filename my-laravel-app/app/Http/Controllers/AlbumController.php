<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests\AlbumRequest;
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

        $latestRecords = $this->albumService->getLatestRecords();

        return view('albums.index')->with('albums', $latestRecords);
    }

    public function sampleMethod01() {

        $message = "message01";

        return response($message, Response::HTTP_OK);
    }

    public function addmylist(AlbumRequest $request) {

        $this->albumService->executeSomething( intval($request->album_id) );

        return response($request->album_id, Response::HTTP_OK);
    }

}
