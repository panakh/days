<?php


namespace App\Service;


use DateTime;
use DateTimeZone;

class DaysService
{

    public function getUTCOffset($date, $timezone)
    {
        $first = new DateTime($date, new DateTimeZone($timezone));
        $inSeconds =  $first->getOffset();

        return intval(round($inSeconds/60));
    }
}