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

        return $this->sampleRepository->index();
    }

    public function create()
    {
        return $this->sampleRepository->create();
    }

    public function show()
    {
        // return $this->sampleRepository->getLatestRecords();
        return $this->sampleRepository->show();
    }

    public function store()
    {
        return $this->sampleRepository->store();
    }

    public function edit()
    {
        return $this->sampleRepository->edit();
    }

    public function update()
    {
        return $this->sampleRepository->update();
    }

    public function destroy()
    {
        return $this->sampleRepository->delete();
    }

    public function delete()
    {
        return $this->sampleRepository->delete();
    }
}
