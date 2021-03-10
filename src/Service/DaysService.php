<?php


namespace App\Service;


use DateTime;
use DateTimeZone;

class DaysService
{

    public function getUTCOffset($date, $timezone)
    {

        $first = new \DateTimeZone($timezone);
        $second = new \DateTimeZone('UTC');
        $inSeconds =  $first->getOffset(new DateTime($date, $second));

        return $inSeconds/60;
    }
}