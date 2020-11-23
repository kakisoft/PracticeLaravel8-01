<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Services\AlbumService;
use App\Repositories\AlbumRepository;

// ./vendor/bin/phpunit tests/Unit/Services/AlbumServiceTest.php

class AlbumServiceTest extends TestCase
{
    private $albumService;

    public function setUp(): void
    {
        parent::setUp();

        $this->albumService = new AlbumService(new AlbumRepository());

        // $albumRepository
    }

    /**
     *
     */
    public function test_executeForTest()
    {
        $test_param = 1;
        $expectec_result = $test_param + 1;

        $result = $this->albumService->executeForTest($test_param);
        $this->assertEquals($result, $expectec_result);
    }


}
