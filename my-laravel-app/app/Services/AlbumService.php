<?php

namespace App\Services;

use App\Repositories\AlbumRepository;

class AlbumService
{
    private $albumRepository;

    public function __construct(AlbumRepository $albumRepository)
    {
        $this->albumRepository = $albumRepository;
    }

    public function executeSomething(int $artist_id): array
    {
        $this->albumRepository->addMyAlbum($artist_id);

        return array();
    }

}
