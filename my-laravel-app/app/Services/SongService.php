<?php

namespace App\Services;

use App\Repositories\SongRepository;

class SongService
{
    private $songRepository;

    public function __construct(SongRepository $songRepository)
    {
        $this->songRepository = $songRepository;
    }

    public function executeSomething(int $artist_id): array
    {
        $this->songRepository->addMySong($artist_id);

        return array();
    }

    public function executeForTest(int $test_param): int
    {
        return $test_param + 1;
    }

    public function getLatestRecords()
    {
        return $this->songRepository->getLatestRecords();
    }
}
