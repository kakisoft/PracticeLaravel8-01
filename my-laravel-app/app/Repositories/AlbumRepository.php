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
            //=========================================================
            //   モデルを直接操作対象とせず、プロパティに保持した値を使用する
            //=========================================================
            $this->model->artist_id = $artist_id;
            $this->model->name  = 'name001';
            $this->model->cover = 'cover002';
            $this->model->save();


            //=========================================================
            //   モデルを直接操作対象とせず、プロパティに保持した値を使用する
            //=========================================================
            $this->model::updateOrCreate([
                'artist_id' => '999',
                'name'      => 'name003',
                'cover'     => 'cover003',
            ]);

            return true;

        } catch (Exception $e) {
            return false;
        }
    }
}