<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\PlaylistRepository;

class PlaylistController extends Controller
{
    private $playlistRepository;

    public function __construct(
        PlaylistRepository $playlistRepository
    ) {
        $this->playlistRepository = $playlistRepository;
    }

    public function index() {

        $myPlaylist = $this->playlistRepository->getMyPlaylist(1);

dump($myPlaylist);

        return;
    }
}
