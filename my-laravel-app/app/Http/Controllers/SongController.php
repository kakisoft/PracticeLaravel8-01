<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests\SongRequest;
use App\Services\SongService;

class SongController extends Controller
{
    private $songService;

    public function __construct(
        SongService $songService
    ) {
        $this->songService = $songService;
    }

    public function index() {

        $latestRecords = $this->songService->getLatestRecords();

        return view('songs.index')->with('songs', $latestRecords);
    }

    public function sampleMethod01() {

        $message = "message01";

        return response($message, Response::HTTP_OK);
    }

    public function addmylist(SongRequest $request) {

        $this->songService->executeSomething( intval($request->song_id) );

        return response($request->song_id, Response::HTTP_OK);
    }
}
