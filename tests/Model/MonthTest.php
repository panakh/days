<?php

namespace App\Tests\Model;

use App\Model\Month;
use PHPUnit\Framework\TestCase;

class MonthTest extends TestCase
{

    /**
     * @dataProvider dateMonthProvider
     * @param $date
     * @param $expectedMonth
     */
    public function testGetsMonth($date, $expectedMonth): void
    {
        $this->assertEquals($expectedMonth, new Month($date));
    }

    public function dateMonthProvider(): array
    {
        return [
            ['2019-07-10', 'July'],
            ['2016-11-28', 'November'],
            ['1853-01-30', 'January'],
        ];
    }
}
