<?php

namespace App\Services;

use App\Models\Album;
use App\Repositories\AlbumRepository;

class AlbumService
{
    private $albumRepository;

    public function __construct(AlbumRepository $albumRepository)
    {
        $this->albumRepository = $albumRepository;
    }

    /**
     *
     */
    public function addMyAlbum(int $artist_id): array
    {
        $this->albumRepository->addMyAlbum($artist_id);

        return array();
    }

    /**
     *
     */
    public function executeForTest(int $test_param): int
    {
        return $test_param + 1;
    }

    /**
     *
     */
    public function getMyAlbum(int $id) : ?array
    {
        return $this->albumRepository->getById($id);
    }

    /**
     *
     */
    public function getLatestRecords()
    {
        return $this->albumRepository->getLatestRecords();
    }
}
