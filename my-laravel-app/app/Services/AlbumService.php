<?php

namespace App\Services;

use App\Repositories\AlbumRepository;
use App\Models\Album;

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

    public function executeForTest(int $test_param): int
    {
        return $test_param + 1;
    }

    public function getLatestRecords()
    {
        return $this->albumRepository->getLatestRecords();
    }
}
