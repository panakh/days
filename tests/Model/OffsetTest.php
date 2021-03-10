<?php

namespace App\Tests\Model;

use App\Model\Offset;
use PHPUnit\Framework\TestCase;

class OffsetTest extends TestCase
{

    /**
     * @dataProvider dateProvider
     * @param $date
     * @param $timezone
     * @param $expectedOffset
     * @return void
     */
    public function testGetsCorrectUTCOffsets($date, $timezone, $expectedOffset): void
    {
        $offset = new Offset($date, $timezone);
        $this->assertEquals($expectedOffset, $offset->get());
    }

    /**
     * @dataProvider formattedProvider
     * @param $date
     * @param $timezone
     * @param $formatted
     */
    public function testFormats($date, $timezone, $formatted): void
    {
        $offset = new Offset($date, $timezone);
        $this->assertEquals($formatted, (string) $offset);
    }

    public function dateProvider(): array
    {
        return [
            ['2019-07-10', 'Europe/London', 60],
            ['2016-11-28', 'Asia/Tokyo', 540],
            ['1853-01-30', 'America/Lower_Princes', -276],
        ];
    }

    public function formattedProvider(): array
    {
        return [
            ['2019-07-10', 'Europe/London', '+60'],
            ['2016-11-28', 'Asia/Tokyo', '+540'],
            ['1853-01-30', 'America/Lower_Princes', '-276'],
        ];
    }
}
