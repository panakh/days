<?php

namespace App\Tests\Model;

use App\Model\Days;
use App\Model\Offset;
use PHPUnit\Framework\TestCase;

class DaysTest extends TestCase
{
    private $days;

    public function setUp(): void
    {
        $this->days = (new Days());
    }

    /**
     * @param $date
     * @param $timezone
     */
    public function testGetsCorrectUTCOffsets(): void
    {
        $this->days->setDate('2019-07-10')->setTimezone('Europe/London');
        $this->assertInstanceOf(Offset::class, $this->days->getUTCOffset());
    }

    /**
     * @dataProvider dateMonthProvider
     */
    public function testGetsMonth($date, $month)
    {
        $this->days->setDate($date);
        $this->assertEquals($month, $this->days->getMonth());
    }

    public function dateMonthProvider()
    {
        return [
            ['2019-07-10', 'July'],
            ['2016-11-28', 'November'],
            ['1853-01-30', 'January'],
        ];
    }
}
