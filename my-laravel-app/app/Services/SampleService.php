<?php

namespace App\Services;

use App\Repositories\SampleRepository;

class SampleService
{
    private $sampleRepository;

    public function __construct(SampleRepository $sampleRepository)
    {
        $this->sampleRepository = $sampleRepository;
    }

    public function executeSomething(int $artist_id): array
    {
        $this->sampleRepository->addMySample($artist_id);

        return array();
    }

    public function executeForTest(int $test_param): int
    {
        return $test_param + 1;
    }

    public function getLatestRecords()
    {
        return $this->sampleRepository->getLatestRecords();
    }
}
