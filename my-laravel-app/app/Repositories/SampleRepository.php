<?php

namespace App\Repositories;

use App\Models\Sample;
use Exception;
use Illuminate\Support\Facades\Log;

class SampleRepository extends AbstractRepository
{
    public function getModelClass(): string
    {
        return Sample::class;
    }

    public function index()
    {
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