<?php

namespace App\Repositories;

use App\Models\Song;

class SongRepository extends AbstractRepository
{
    public function getModelClass(): string
    {
        return Song::class;
    }

    public function getMySong(int $id): array
    {
        return $this->model->find($id)->toArray();
    }

    public function getLatestRecords()
    {
        return $this->model::latest()->get();
    }

}