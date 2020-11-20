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

    public function addMyAlbum(int $artist_id): bool
    {
        try {
            Album::updateOrCreate([
                'artist_id' => $artist_id,
                'name'      => 'name001',
                'cover'     => 'cover001',
            ]);

            return true;

        } catch (Exception $e) {
            return false;
        }
    }
}