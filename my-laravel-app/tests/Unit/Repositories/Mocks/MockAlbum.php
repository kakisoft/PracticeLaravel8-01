<?php

namespace Tests\Unit\Repositories\Mocks;

use SplFixedArray;

class MockAlbum
{
    public function find(int $id){

        $fa = new SplFixedArray(3);
        $fa[0] = $id;
        $fa[2] = 2;

        return $fa;
    }
}
