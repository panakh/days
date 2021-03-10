<?php

namespace App\Tests\Model;

use App\Model\Offset;
use PHPUnit\Framework\TestCase;

class OffsetTest extends TestCase
{

    /**
     * @dataProvider dateProvider
     */
    public function testGetsCorrectUTCOffsets($date, $timezone, $expectedOffset): void
    {
        $offset = new Offset($date, $timezone);
        $this->assertEquals($expectedOffset, $offset->get());
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
