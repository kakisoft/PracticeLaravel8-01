<?php

namespace App\Repositories;

use App\Models\Album;

class AlbumRepository extends AbstractRepository
{
    public function getModelClass(): string
    {
        return Album::class;
    }

    public function getMyAlbum(int $id): array
    {
        return $this->model->find($id)->toArray();
    }
}