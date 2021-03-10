<?php

namespace App\Tests\Service;

use App\Service\DaysService;
use PHPUnit\Framework\TestCase;

class DaysServiceTest extends TestCase
{
    /**
     * @dataProvider dateProvider
     */
    public function testGetsCorrectUTCOffsets($date, $timezone): void
    {
        $service = new DaysService();
        $offset = $service->getUTCOffset($date, $timezone);
        $this->assertEquals('60', $offset);
    }

    public function dateProvider()
    {
        return [
            ['2019-07-10', 'Europe/London'],
        ];
    }
}
