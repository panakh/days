<?php

namespace App\Tests\Service;

use App\Service\DaysService;
use PHPUnit\Framework\TestCase;

class DaysServiceTest extends TestCase
{
    public function testGetsCorrectUTCOffsets(): void
    {
        $date = '2019-07-10';
        $timezone = 'Europe/London';

        $service = new DaysService();
        $offset = $service->getUTCOffset($date, $timezone);
        $this->assertEquals('60', $offset);
    }
}
