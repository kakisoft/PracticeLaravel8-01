<?php

namespace App\Repositories\Interfaces;

interface SongRepositoryInterface
{
    public function save(int $id, array $params);

    public function delete(int $id);

    public function getLatestRecords();

    public function getMySong(int $id);
}