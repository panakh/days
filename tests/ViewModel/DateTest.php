<?php

namespace App\Tests\ViewModel;

use App\ViewModel\Date;
use App\Model\Offset;
use PHPUnit\Framework\TestCase;

class DateTest extends TestCase
{
    private $date;

    public function setUp(): void
    {
        $this->date = (new Date());
    }

    public function testGetsCorrectUTCOffsets(): void
    {
        $this->date->setDate('2019-07-10')->setTimezone('Europe/London');
        $this->assertInstanceOf(Offset::class, $this->date->getUTCOffset());
    }

    /**
     * @dataProvider dateMonthProvider
     * @param $date
     * @param $month
     */
    public function testGetsMonth($date, $month): void
    {
        $this->date->setDate($date);
        $this->assertEquals($month, $this->date->getMonth());
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
