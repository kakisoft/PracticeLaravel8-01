<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Services\AlbumService;
use App\Repositories\AlbumRepository;
use Tests\Unit\Repositories\Mocks\MockAlbum;

// ./vendor/bin/phpunit tests/Unit/Repositories/AlbumRepositoryTest.php

class AlbumRepositoryTest extends TestCase
{
    private $albumRepository;

    public function setUp(): void
    {
        parent::setUp();

        $mock = new MockAlbum();
        $this->albumRepository = new AlbumRepository($mock);
    }

    /**
     *
     */
    public function test_executeForTest()
    {
        $test_param = 1;
        $expectec_result = $test_param;

        $result = $this->albumRepository->getMyAlbum($test_param);

        $this->assertEquals($test_param, $expectec_result);

    }

}

