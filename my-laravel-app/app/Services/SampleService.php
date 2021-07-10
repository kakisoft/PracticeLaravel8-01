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

    public function index()
    {
        // $this->sampleRepository->addMySample($artist_id);

        return __METHOD__;
    }

    public function create()
    {
        return __METHOD__;
    }

    public function show()
    {
        // return $this->sampleRepository->getLatestRecords();
        return __METHOD__;
    }

    public function store()
    {
        return __METHOD__;
    }

    public function edit()
    {
        return __METHOD__;
    }

    public function update()
    {
        return __METHOD__;
    }

    public function destroy()
    {
        return __METHOD__;
    }

    public function delete()
    {
        return __METHOD__;
    }
}
