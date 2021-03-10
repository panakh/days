<?php

namespace App\Tests\Model;

use App\Model\DaysInMonth;
use PHPUnit\Framework\TestCase;

class DaysInMonthTest extends TestCase
{
    /**
     * @dataProvider februaryDaysProvider
     */
    public function testGetsFebruaryDays($date, $days)
    {
        $this->assertEquals($days, DaysInMonth::inFebruary($date)->get());
    }

    public function februaryDaysProvider()
    {
        return [
            ['2019-07-10', 28],
            ['2016-11-28', 29],
            ['1853-01-30', 28],
        ];
    }

    /**
     * @dataProvider daysInMonthProvider
     */
    public function testGetsDaysInMonth($date, $days)
    {
        $this->assertEquals($days, DaysInMonth::specified($date)->get());
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
