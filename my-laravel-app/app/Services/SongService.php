<?php

namespace App\Services;

use App\Repositories\SongRepository;
use App\Repositories\Interfaces\SongRepositoryInterface;

class SongService
{
    private $songRepository;

    public function __construct(SongRepositoryInterface $songRepository)
    {
        $this->songRepository = $songRepository;
    }

    public function executeSomething(int $song_id): array
    {
        // dd("bbb");
        // $this->songRepository->addMySong($song_id);

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
