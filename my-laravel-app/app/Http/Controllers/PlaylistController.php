<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PlaylistController extends Controller
{
    public function __construct(
        PlaylistRepository $playlistRepository
    ) {
        $this->playlistRepository = $playlistRepository;
    }
}
