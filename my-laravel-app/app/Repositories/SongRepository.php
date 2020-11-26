<?php

namespace App\Repositories;

use App\Models\Song;
use App\Repositories\Interfaces\SongRepositoryInterface;

class SongRepository extends AbstractRepository implements SongRepositoryInterface
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

    public function save($id, array $params)
    {
        return;
    }

    public function delete($id)
    {
        return;
    }

}