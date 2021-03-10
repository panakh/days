<?php

namespace App\Tests\Service;

use App\Service\DaysService;
use PHPUnit\Framework\TestCase;

class DaysServiceTest extends TestCase
{
    /**
     * @dataProvider dateProvider
     */
    public function testGetsCorrectUTCOffsets($date, $timezone, $expectedOffset): void
    {
        $service = new DaysService();
        $offset = $service->getUTCOffset($date, $timezone);
        $this->assertEquals($expectedOffset, $offset);
    }

    public function dateProvider()
    {
        return [
            ['2019-07-10', 'Europe/London', 60],
            ['2016-11-28', 'Asia/Tokyo', 540],
            ['1853-01-30', 'America/Lower_Princes', -276],
        ];
    }
}
