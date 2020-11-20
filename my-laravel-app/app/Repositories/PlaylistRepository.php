<?php

namespace App\Repositories;

use App\Models\Playlist;

class PlaylistRepository extends AbstractRepository
{
    public function getModelClass(): string
    {
        return Playlist::class;
    }

    public function getMyPlaylist(int $id): array
    {
        return $this->model->find($id)->toArray();
    }
}
