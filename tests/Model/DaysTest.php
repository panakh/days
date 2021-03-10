<?php

namespace App\Tests\Model;

use App\Model\Days;
use App\Service\DaysService;
use PHPUnit\Framework\TestCase;

class DaysTest extends TestCase
{
    private $days;

    public function setUp(): void
    {
        $this->days = (new Days());

    }

    /**
     * @dataProvider dateProvider
     */
    public function testGetsCorrectUTCOffsets($date, $timezone, $expectedOffset): void
    {
        $this->days->setDate($date)->setTimezone($timezone);
        $offset = $this->days->getUTCOffset();
        $this->assertEquals($expectedOffset, $offset);
    }

    /**
     * @dataProvider dateMonthProvider
     */
    public function testComputesMonth($date, $month)
    {
        $this->days->setDate($date);
        $this->assertEquals($month, $this->days->getMonth($date));
    }

    /**
     * @dataProvider februaryDaysProvider
     */
    public function testGetsFebruaryDays($date, $days)
    {
        $this->days->setDate($date);
        $this->assertEquals($days, $this->days->getFebruaryDays($date));
    }

    /**
     * @dataProvider daysInMonthProvider
     */
    public function testGetsDaysInMonth($date, $days)
    {
        $this->days->setDate($date);
        $this->assertEquals($days, $this->days->getDaysInMonth());
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

    public function daysInMonthProvider()
    {
        return [
            ['2019-07-10', 31],
            ['2016-11-28', 30],
            ['1853-01-30', 31],
        ];
    }
}
