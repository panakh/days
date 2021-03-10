<?php

namespace App\Tests\ViewModel;

use App\Model\Days;
use App\ViewModel\Date;
use App\Model\Offset;
use PHPUnit\Framework\TestCase;

class DateTest extends TestCase
{
    private $date;

    public function setUp(): void
    {
        $this->date = (new Date())->setDate('2019-07-10')->setTimezone('Europe/London');
    }

    public function testGetsUTCOffset(): void
    {
        $this->assertInstanceOf(Offset::class, $this->date->getUTCOffset());
    }

    public function testGetsDaysInMonth()
    {
        $this->assertInstanceOf(Days::class, $this->date->getDaysInMonth());
    }

    public function testGetsFebruaryMonth()
    {
        $this->assertInstanceOf(Days::class, $this->date->getFebruaryDays());
    }
}
