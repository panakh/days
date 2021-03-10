<?php

namespace App\Tests\Service;

use App\Service\DaysService;
use PHPUnit\Framework\TestCase;

class DaysServiceTest extends TestCase
{
    private $service;

    public function setUp(): void
    {
        $this->service = new DaysService();
    }

    /**
     * @dataProvider dateProvider
     */
    public function testGetsCorrectUTCOffsets($date, $timezone, $expectedOffset): void
    {

        $offset = $this->service->getUTCOffset($date, $timezone);
        $this->assertEquals($expectedOffset, $offset);
    }

    /**
     * @dataProvider dateMonthProvider
     */
    public function testComputesMonth($date, $month)
    {

        $this->assertEquals($month, $this->service->getMonth($date));
    }

    /**
     * @dataProvider februaryDaysProvider
     */
    public function testGetsFebruaryDays($date, $days)
    {
        $this->assertEquals($days, $this->service->getFebruaryDays($date));
    }

    public function dateProvider()
    {
        return [
            ['2019-07-10', 'Europe/London', 60],
            ['2016-11-28', 'Asia/Tokyo', 540],
            ['1853-01-30', 'America/Lower_Princes', -276],
        ];
    }

    public function dateMonthProvider()
    {
        return [
            ['2019-07-10', 'July'],
            ['2016-11-28', 'November'],
            ['1853-01-30', 'January'],
        ];
    }

    public function februaryDaysProvider()
    {
        return [
            ['2019-07-10', 28],
            ['2016-11-28', 29],
            ['1853-01-30', 28],
        ];
    }
}
