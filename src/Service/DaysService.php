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

    public function getMonth($date): string
    {
        return (new DateTime($date))->format('F');
    }

    public function getFebruaryDays($date): int
    {
        $date = new DateTime($date);
        $time = mktime(0, 0, 0, 2, 1, $date->format('Y'));
        $february =  new DateTime('@'.$time);

        return intval($february->format('t'));
    }

    public function getDaysInMonth($date): int
    {
        return (new DateTime($date))->format('t');
    }
}